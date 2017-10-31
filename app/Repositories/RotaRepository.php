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
        return $this->model->all();           
    }
}