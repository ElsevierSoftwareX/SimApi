<?php

class ActionController extends BaseController {
	public function postSetTem($instance_id)
	{
		$input = Input::get();	
		$action = Actions::create(array(		
		    'Timestep_idTimestep' =>1,
			'Timestep_Instance_idInstance'=>$instance_id,
			'StorageTankSetPoint_Override'=>$input['TSetHea'],			 
			'CirculationPumpHeatLoop'=>$input['Status']
		));
		
		return Response::json(array('Action_id' => $action->idActions, 'Status' => $action->CirculationPumpHeatLoop));
	}
}