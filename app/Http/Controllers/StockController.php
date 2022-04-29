<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Supplier;
use App\Http\Resources\StockResource;
use App\Http\Resources\StockCollection;
use Log;
use DB;
use Redirect;

class StockController extends Controller
{
    public function __construct(Stock $stock, Item $item, Supplier $supplier)
    {
      $this->with = ['item', 'supplier'];
      $this->stock = $stock;
      $this->item = $item;
      $this->supplier = $supplier;
    }

    public function received(Request $request)
    {
      abort_unless($request->user()->isAbleTo('received_items-read'), 403);

      try {
        $receivedItems        = $this->stock->with($this->with)->where('tr_type', 'received')->get();
        $receivedItemsDetails = new StockCollection($receivedItems);
        return Inertia::render('Received', [
            'receivedItems' => $receivedItemsDetails,
        ]);
      } catch (\Exception $e) {
        Log::emergency($e);
        $msg = __('common.error');
        return Inertia::render('Error', [
            'error' => $msg,
        ]);
      }
    }

    public function receivedCreate(Request $request)
    {
      abort_unless($request->user()->isAbleTo('received_items-create'), 403);

      $allItems = $this->item->active()->get();
      $suppliers = $this->supplier->active()->get();

        return Inertia::render('ReceivedCreate', [
          'items'     => $allItems,
          'suppliers' => $suppliers
        ]);
    }

    public function receivedStore(Request $request)
    {
      abort_unless($request->user()->isAbleTo('received_items-create'), 403);

      $request->validate([
        'item'      => ['required'],
        'supplier'  => ['required'],
        'qty'       => ['required'],
        'price'     => ['required']
      ]);
      $trNo = $this->stock->where('tr_type', 'received')->count()+1;
      try {
        DB::beginTransaction();
        $stock = new Stock;
        $stock->item_id = $request->item;
        $stock->supplier_id = $request->supplier;
        $stock->in_qty = $request->qty;
        $stock->price = $request->price;
        $stock->tr_type = "received";
        $stock->status = "approved";
        $stock->tr_no = $trNo;
        $stock->save();
        DB::commit();
        return Redirect::route('received');
      } catch (\Exception $e) {
        DB::rollback();
        Log::emergency($e);
        $msg = __('common.error');
        return Inertia::render('Error', [
            'error' => $msg,
        ]);
      }

    }

    public function requisition(Request $request)
    {
      try {
        $issuedItems        = $this->stock->with($this->with)->where('tr_type', 'issued')->get();
        $issuedItemsDetails = new StockCollection($issuedItems);
        return Inertia::render('Requisition', [
            'issuedItems' => $issuedItemsDetails,
        ]);
      } catch (\Exception $e) {
        Log::emergency($e);
        $msg = __('common.error');
        return Inertia::render('Error', [
            'error' => $msg,
        ]);
      }
    }

    public function requisitionStore(Request $request)
    {
      return $request->all();
    }

    public function requisitionCreate(Request $request)
    {
      return $request->all();
    }
}
