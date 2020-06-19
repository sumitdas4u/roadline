<?php

namespace App;

use App\Traits\HasAttributes;
use App\Traits\HasCategories;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
	use Sluggable, HasCategories,HasAttributes;

	/**
	 * Defined table name
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * Fields that are mass assignable
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'short_description', 'description','photos',
		'category_id', 'is_active'
	];

	/**
	 * Guarded Fields
	 *
	 * @var array
	 */
	protected $guarded = [
		'id', 'created_at', 'updated_at'
	];

	/**
	 * Fields that should be casted on another
	 * type
	 *
	 * @var array
	 */
	protected $casts = [
		'is_active' => 'boolean'
	];

	/**
	 * Sluggable field of the model
	 *
	 * @var string
	 */
	protected $sluggable = 'name';
    protected $appends = ['category_name','attributes_id'];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
