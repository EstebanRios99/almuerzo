<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Register extends JsonResource
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
            'id'=>$this->id,
            'date'=>$this->created_at->format('d-m-Y'),
            'checkIn'=>$this->checkIn,
            'checkOut'=>$this->checkOut,
            'employ'=>new Employ($this->employ),
            
        ];
    }
}
