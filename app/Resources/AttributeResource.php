<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'value' => $this->value,
			'type' => $this->attribute->name
		];
	}
}
