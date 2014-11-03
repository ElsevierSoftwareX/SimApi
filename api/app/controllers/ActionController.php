<?php

class ActionController extends BaseController {
public function postSetTem($instance_id)
	{
		 $input = Input::get();
		 $action = Actions::create(array(
				   'Timestep_Instance_idInstance'=>$instance_id,
				   'StorageTankSetPoint_Override'=>$input['TSetHea']
		   ));
          $response=$action->idActions;
	    return Response::json(array('Action_id' => $response));
	}
}