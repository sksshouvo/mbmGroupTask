<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Item;
use App\Models\Stock;
use Log;
use DB;
use Redirect;

class ItemController extends Controller
{

  public function __construct(Item $item, Stock $stock)
  {
    $this->item = $item;
    $this->stock = $stock;
  }
    public function index(Request $request)
    {
        abort_unless($request->user()->isAbleTo('items-read'), 403);
        try {
          $items = $this->item->select('items.*', DB::raw('(select sum(stocks.in_qty - stocks.out_qty) from stocks where stocks.item_id = items.id) as stock'))->get();
          return Inertia::render('Item', [
              'items' => $items,
          ]);
        } catch (\Exception $e) {
          Log::emergency($e);
          $msg = __('common.error');
          return Inertia::render('Error', [
              'error' => $msg,
          ]);
        }
    }

    public function store(Request $request)
    {
      abort_unless($request->user()->isAbleTo('items-create'), 403);

      $request->validate([
          'name' => ['required'],
          'description' => ['required'],
          'status' => ['required'],
      ]);

      try {
        DB::beginTransaction();
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->save();
        DB::commit();
        if ($item) {
          return Redirect::route('item');
        }
      } catch (\Exception $e) {
        DB::rollback();
        Log::emergency($e);
        $msg = __('common.error');
        return Inertia::render('Error', [
            'error' => $msg,
        ]);
      }
    }
}
