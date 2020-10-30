<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employ extends JsonResource
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
            'identification'=>$this->identification,
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'user'=>new User($this->user),
            //'register'=>new Register($this->register),

        ];
    }
}
