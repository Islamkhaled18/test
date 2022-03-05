<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_name'=>$this->category_name,

            // 'category_name_ar'=>$this->category_name_ar,
            // 'category_name_en'=>$this->category_name_en,
        ];
    }
}
