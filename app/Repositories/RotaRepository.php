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
        $rota = $this->model->active()->orderBy('daynumber')->get();
        $data['rotaDays'] = array();
        $data['rotaHours'] = array();

        foreach($rota as $shift) {
            
            //Correlate unique days
            if(array_search($shift->daynumber, $data['rotaDays']) === false){
                $data['rotaDays'][] = $shift->daynumber;
            }
            
            //Build new array to pass to view
            $data['rota'][$shift->staffid][$shift->daynumber]['dayoff'] = $shift->slottype == 'dayoff' ? true : 0;
            $data['rota'][$shift->staffid][$shift->daynumber]['starttime'] = $shift->starttime;
            $data['rota'][$shift->staffid][$shift->daynumber]['endtime'] = $shift->endtime;

            $data['rotaHours'][$shift->daynumber][] = $shift->workhours;
        }

        //Clear excess data + Calculate Total Hours
        foreach($data['rotaHours'] as $day => $hours) {
            unset($data['rotaHours'][$day]);
            $data['rotaHours'][$day]['total'] = array_sum($hours);
        }
        return $data;        
    }
}