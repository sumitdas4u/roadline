<?php

namespace  App\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasUsers
{
	/**
	 * Assert if the Category has product based name or id
	 *
	 * @param string|int $product
	 * @return bool
	 */
	public function hasUsers($product): bool
	{
		if (is_numeric($product)) {
			return $this->users()->where('id', $product)->exists();
		} elseif (is_string($product)) {
			return $this->users()->where('name', $product)->exists();
		}

		return false;
	}



	/**
	 * Relation on the product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany $this
	 */
	public function users(): HasOne
	{
		return $this->hasOne('App\User','id','user_id');
	}
    public function getUserNameAttribute()
    {
        return $this->users->name;

    }
}
