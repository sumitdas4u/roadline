<?php

namespace App\Traits;

use App\Quotation;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasQuotations
{
	/**
	 * Relation on the Product
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo $this
	 */
	public function quotation(): hasMany
	{
		return $this->hasMany(Quotation::class);
	}

    public function hasQuotation($quotation): bool
    {
        if (is_numeric($quotation)) {
            return $this->quotation()->where('id', $quotation)->exists();
        } elseif (is_string($quotation)) {
            return $this->quotation()->where('name', $quotation)->exists();
        }

        return false;
    }

}
