<?php

namespace  App\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasProducts
{
	/**
	 * Assert if the Category has product based name or id
	 *
	 * @param string|int $product
	 * @return bool
	 */
	public function hasProduct($product): bool
	{
		if (is_numeric($product)) {
			return $this->products()->where('id', $product)->exists();
		} elseif (is_string($product)) {
			return $this->products()->where('name', $product)->exists();
		}

		return false;
	}


	/**
	 * Relation on the product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany $this
	 */
	public function products()
	{
		return $this->hasOne('App\Product','id','truck_type_id');
	}
    public function getProductNameAttribute()
    {
        return $this->products->name;

    }
}
