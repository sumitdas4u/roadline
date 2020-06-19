<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCategories
{
	/**
	 * Relation on the Product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo $this
	 */
	public function category(): BelongsTo
	{
		return $this->belongsTo('App\Category');
	}
    public function getCategoryNameAttribute()
    {
        return $this->category()->first()->name;
    }


}
