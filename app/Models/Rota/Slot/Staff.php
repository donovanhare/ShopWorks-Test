<?php

namespace App\Models\Rota\Slot;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'rota_slot_staff';

    public function scopeActive($query)
    {
        return $query->whereNotNull('staffid');
    }

    public function scopeShifts($query)
    {
        $query->active();
        $query->where('slottype', 'shift');
        return $query;
    }

    public function scopeDaysOff($query) 
    {
        $query->active();
        $query->where('slottype', 'dayoff');
        return $query;
    }

}
