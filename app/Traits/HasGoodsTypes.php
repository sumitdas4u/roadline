<?php

namespace  App\Traits;

use App\GoodsType;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasGoodsTypes
{
	/**
	 * Assert if the Category has product based name or id
	 *
	 * @param string|int $product
	 * @return bool
	 */
	public function HasGoodsTypes($goodsType): bool
	{
		if (is_numeric($goodsType)) {
			return $this->users()->where('id', $goodsType)->exists();
		} elseif (is_string($goodsType)) {
			return $this->users()->where('name', $goodsType)->exists();
		}

		return false;
	}




    public function getGoodsTypesListAttribute ()
    {

        return GoodsType::all()->filter(function($goodsTypes) {
            return in_array($goodsTypes->id,$this->goods_type_id ) ? $goodsTypes : '';
        });


    }
}
