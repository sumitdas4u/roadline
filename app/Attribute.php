<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    /**
     * Table name of the model
     *
     * @var string
     */
    protected $table = 'product_attribute_types';

    /**
     * Disable the timestamp on model creation
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Fields that can't be assign
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Add Value on the attribute
     *
     * @param string|array $value
     */
    public function addValue($value)
    {
        if (is_array($value)) {
            $terms = collect($value)->map(function ($term) {
                return [
                    'value' => $term,
                    'is_active'=>1
                ];
            })
            ->values()
            ->toArray();

            return $this->values()->createMany($terms);
        }
      return $this->values()->createMany(['value' => $value,'is_active'=>1]);
    }

    public function addAttributes($value)
    {
        if (is_array($value)) {
            $terms = collect($value)->map(function ($term) {
                return ['name' => $term ,
                    'is_active'=>1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ];
            })
                ->toArray();

            return $this->insert($terms);
        }
        return $this->insert(['name' => $value]);
    }

    /**
     * Remove a term on an attribute
     *
     * @param string $term
     */
    public function removeValue($term)
    {
        return $this->values()->where('value', $term)->firstOrFail()->delete();
    }



    /**
     * Relation to the values
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany $this
     */
    public function values(): HasMany
    {
        return $this->hasMany('App\AttributeValue', 'product_attribute_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
