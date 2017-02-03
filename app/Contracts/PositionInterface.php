<?php 

namespace App\Contracts;

interface PositionInterface
{
    /**
     * 
     */
    public function getAll();

    /**
     * 
     */
    public function getOne($id);  

}
