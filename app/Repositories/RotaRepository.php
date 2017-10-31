<?php 

namespace App\Repositories;

use App\Models\Rota\Slot\Staff as SlotRota;

class RotaRepository implements RotaInterface 
{
    private $model;

    public function __construct(SlotRota $model) 
    {
        $this->model = $model;
    }

    public function getShifts() 
    {
        return $this->model->all();
    }
    
    public function getDaysOff() 
    {
        return $this->model->all();   
    }
    
    public function getActive() 
    {
        //Grab all rota entries that have staffids
        $shiftData = [];
        $rota = $this->model->active()->orderBy('daynumber')->get();$data['rotaHours'] = array();

        foreach($rota as $shift) {
            //Build new array to pass to view
            $shiftData[$shift->staffid][$shift->daynumber]['dayoff'] = $shift->slottype == 'dayoff' ? true : 0;
            $shiftData[$shift->staffid][$shift->daynumber]['starttime'] = $shift->starttime;
            $shiftData[$shift->staffid][$shift->daynumber]['endtime'] = $shift->endtime;
        }
        return $shiftData;        
    }

    public function getDays() 
    {
        $days = $this->model->distinct()->get(['daynumber']);
        return $days->toArray();
    }

    public function getTotalHours()
    {
        $totalHours = $this->model->selectRaw('sum(workhours) as workhours')
                                    ->active()
                                    ->groupby('daynumber')
                                    ->get();
        return $totalHours->toArray();
    }
}