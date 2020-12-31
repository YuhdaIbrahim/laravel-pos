<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\Product\ProductIndexResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrderDetails extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'status' => $this->status,
            'order_details' => ShowDetailsCollection::collection($this->order_details),
        ];
    }
}
