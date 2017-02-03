<?php 

namespace App\Services;

use App\Contracts\PositionInterface;
use App\SalonPosition;

class PositionService implements PositionInterface
{

	/**
	 * Create a new instance of UserService class
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->position = new SalonPosition();
	}

   
    /**
     * 
     */
    public function getAll()
    {
        return $this->position->get();
    }

    /**
     * 
     */
    public function getOne($id)
    {
    	return $this->position->find($id);
    }
}