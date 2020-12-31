<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeIndexResource extends JsonResource
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
            'name' =>$this->user->name,
            'email' =>$this->user->email,
            'jabatan' =>$this->jabatan,
            'gaji' =>$this->gaji,
        ];
    }
}
