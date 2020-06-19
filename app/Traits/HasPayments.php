<?php

namespace App\Traits;

use App\Payment;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasPayments
{
    public function payment(): hasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function hasPayment($payment): bool
    {
        if (is_numeric($payment)) {
            return $this->payment()->where('id', $payment)->exists();
        } elseif (is_string($payment)) {
            return $this->payment()->where('name', $payment)->exists();
        }

        return false;
    }


}
