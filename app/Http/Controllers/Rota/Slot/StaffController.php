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
        $data['staffDays'] = array();
        foreach($data['staffRota'] as $staffRota) {
            
            if(array_search($staffRota->daynumber, $data['staffDays']) === false){
                $data['staffDays'][] = $staffRota->daynumber;
            }
            
            $data['staffRotaBreakdown'][$staffRota->staffid][$staffRota->daynumber]['starttime'] = $staffRota->starttime;
            $data['staffRotaBreakdown'][$staffRota->staffid][$staffRota->daynumber]['endtime'] = $staffRota->endtime;
        }
        print_r($data['staffRotaBreakdown']);
        return view('slot_rota', $data);
    }
}
