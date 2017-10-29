<?php

namespace App\Http\Controllers\Rota\Slot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rota\Slot\Staff as SlotRota;

class StaffController extends Controller
{
    //
    protected function get() {
        $data['rota'] = SlotRota::active()->get();
        $data['rotaDays'] = array();

        foreach($data['rota'] as $rota) {
            
            //Correlate unique days
            if(array_search($rota->daynumber, $data['rotaDays']) === false){
                $data['rotaDays'][] = $rota->daynumber;
            }
            
            $data['rotaBreakdown'][$rota->staffid][$rota->daynumber]['dayoff'] = $rota->slottype == 'dayoff' ? true : 0;
            $data['rotaBreakdown'][$rota->staffid][$rota->daynumber]['starttime'] = $rota->starttime;
            $data['rotaBreakdown'][$rota->staffid][$rota->daynumber]['endtime'] = $rota->endtime;
        }
        print_r($data['rotaBreakdown']);
        return view('slot_rota', $data);
    }
}
