<?php

namespace App\Models\Rota\Slot;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'rota_slot_staff';

    public function scopeActive($query)
    {
        $query->whereNotNull('staffid');
        $query->where('staffid', '!=', 0);
        return $query;
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
