<?php

namespace App\Http\Controllers\Rota\Slot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rota\Slot\Staff as SlotRota;

class StaffController extends Controller
{
    protected function get() {
        //Grab all rota entries that have staffids
        $rota = SlotRota::active()->get();

        $data['rotaDays'] = array();
        $data['rotaHours'] = array();
        
        foreach($rota as $rota) {
            
            //Correlate unique days
            if(array_search($rota->daynumber, $data['rotaDays']) === false){
                $data['rotaDays'][] = $rota->daynumber;
            }
            
            //Build new array to pass to view
            $data['rota'][$rota->staffid][$rota->daynumber]['dayoff'] = $rota->slottype == 'dayoff' ? true : 0;
            $data['rota'][$rota->staffid][$rota->daynumber]['starttime'] = $rota->starttime;
            $data['rota'][$rota->staffid][$rota->daynumber]['endtime'] = $rota->endtime;

            $data['rotaHours'][$rota->daynumber][] = $rota->workhours;
        }

        //Clear excess data + Calculate Total Hours
        foreach($data['rotaHours'] as $day => $hours) {
            unset($data['rotaHours'][$day]);
            $data['rotaHours'][$day]['total'] = array_sum($hours);
        }

        return view('slot-rota.staff', $data);
    }
}
