<?php

namespace App\Http\Controllers\Rota\Slot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rota\Slot\Staff as SlotRotaStaff;

class StaffController extends Controller
{
    //
    protected function get() {
        $data['staffRota'] = SlotRotaStaff::active()->get();

        foreach($data['staffRota'] as $staffRota) {
            $data['staffRotaBreakdown'][$staffRota->staffid][$staffRota->daynumber]['starttime'] = $staffRota->starttime;
            $data['staffRotaBreakdown'][$staffRota->staffid][$staffRota->daynumber]['endtime'] = $staffRota->endtime;
        }
        print_r($data['staffRotaBreakdown']);
        return view('slot_rota', $data);
    }
}
