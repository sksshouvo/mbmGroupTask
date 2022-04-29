<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
          'id'          => $this->id,
          'item'        => $this->item->name,
          'in_qty'      => $this->in_qty,
          'out_qty'     => $this->out_qty,
          'price'       => $this->price,
          'amount'      => ($this->in_qty * $this->price) ?? $this->out_qty * $this->price,
          'received_at' => $this->created_at,
          'status'      => $this->status,
          'supplier'    => ($this->supplier->name) ?? NULL
      ];
    }
}
