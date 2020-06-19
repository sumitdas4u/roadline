<?php

namespace App\Adapters;



use App\Resources\AttributeResource;
use App\Resources\CategoryResource;

class CategoryAdapter extends BaseAdapter
{
	/**
	 * Single resource transformer
	 *
	 * @param mixed $model
	 */
	public function __construct($model)
	{
		parent::__construct(new CategoryResource($model));
	}

	/**
	 * Static function for the collection
	 *
	 * @param \Illuminate\Database\Eloquent\Model $model
	 * @return array
	 */
	public static function collection($collection): array
	{
		$resource = new self($collection);
		$resource->setResource(CategoryResource::collection($collection));

		return $resource->transform();
	}
}
