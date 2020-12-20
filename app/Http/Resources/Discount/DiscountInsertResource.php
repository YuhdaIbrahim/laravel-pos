<?php

namespace App\Http\Resources\Discount;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountInsertResource extends JsonResource
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
            'code_discount' => $this->code_discount,
            'discount' => $this->discount,
            'expires' => $this->expires,
            'active' => $this->active,
            'status' => 'success Insert data'
        ];
    }
}
