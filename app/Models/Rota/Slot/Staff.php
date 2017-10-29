<?php

namespace App\Models\Rota\Slot;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'rota_slot_staff';

    public function scopeActive($query)
    {
        return $query->whereNotNull('staffid')->where('slottype', 'shift');
    }

}
