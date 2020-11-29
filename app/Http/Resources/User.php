<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    protected $token;
    public function __construct($resource, $token = null){
        parent::__construct($resource);
        $this->token=$token;
    }

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
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'token' => $this->when($this->token, $this->token),
        ];
    }
}
