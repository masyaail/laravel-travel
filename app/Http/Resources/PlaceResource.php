<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    //public property
    public $status;
    public $massage;


    public function __construct($status, $massage, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->massage = $massage;
    }

    public function toArray($request)
    {
        return [
            'succeed' => $this->status,
            'message' => $this->massage,
            'data' => $this->resource
        ];
    }
}
