<?php

namespace App\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
			'name' => $this->name,
            'photos' => $this->photos,

            'is_active' => $this->is_active,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'attributes' => AttributeResource::collection($this->attributesValues)->toArray(app('request'))

        ];
    }
}
