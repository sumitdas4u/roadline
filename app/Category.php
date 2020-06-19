<?php

namespace App;

use App\Traits\HasProducts;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
	use Sluggable, HasProducts;

	/**
	 * Category Table
	 *
	 * @var string
	 */
	protected $table = 'product_categories';

	/**
	 * Fields that are mass assignable
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'parent_id','is_active'
	];

	/**
	 * Sluggable attributes
	 *
	 * @var string
	 */
	protected $sluggable = 'name';

    protected $casts = [
        'is_active' => 'boolean'
    ];
	/**
	 * Assert if the Category is Parent
	 *
	 * @return bool
	 */
	public function isParent(): bool
	{
		return is_null($this->parent_id);
	}



	/**
	 * Local scope for getting only the parents
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeParentOnly($query)
	{
		return $query->whereNull('parent_id');
	}

	/**
	 * Sub children relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany $this
	 */
	public function children(): HasMany
	{
		return $this->hasMany($this, 'parent_id', 'id');
	}

	/**
	 * Parent Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne $this
	 */
	public function parent(): HasOne
	{
		return $this->hasOne('App\Category', 'id', 'parent_id');
	}
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
