<?php

namespace App\Http\Controllers\Rota\Slot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rota\Slot\Staff as SlotStaff;

class StaffController extends Controller
{
    //
    protected function get() {
        $data['staff'] = SlotStaff::active()->get();
        return view('slot_rota', $data);
    }
}
