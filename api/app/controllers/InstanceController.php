<?php

class InstanceController extends BaseController {

     public function getCreate($user_id){
	 
	    $user = User::find($user_id);
		return Response::make($user);

	   // return View::make('instance.create_instance',array('user'=>$user));
	 }

	 public function createInstanceWeb(){
	 	$userId = Auth::user()->idUser;
	 	$newinst = $this->postCreate($userId)->getData();
	 	return Redirect::intended('/')->with('flash_message','New instance '.$newinst->instance_id.' created');

	 }
     public function postCreate($user_id){
	 
	 	/*$user = User::find($username);
		$user_id = Auth::user()->idUser;
		$name = Input::get('name');
		
		$create = Instance::create(array(
		 
		           'name' =>$name,
				   'User_idUser'=>$user_id
		   ));
        //$instance = Instance::find($)
        $response=array($name);		   
	    return $response;*/
		 $input = Input::get();
		 $create = Instance::create(array(
		           'name' =>$input['name'],
				   'User_idUser'=>$user_id,
				   'begin'=>0
		   ));
          $response=$create->idInstance;
	    return Response::json(array('instance_id' => $response));
	 }
	 
	 public function postSetbegin(){
	 	$input = Input::get();
	    $id=(int) $input["instance_id"];

	    $action = Actions::create(array(
		           'Timestep_idTimestep' =>1,
				   'Timestep_Instance_idInstance'=>$input["instance_id"],
				   'StorageTankSetPoint_Override'=>$input['TSetHea'],
				   'CirculationPumpHeatLoop'=>1,
		   ));
	    $instance = Instance::find($id);
		$instance->begin=1;
		$instance->save();
		return View::make('simulation.results',array('instance_id' => $id));
	}


	 public function postBegin($instance_id){
	    $id=(int)$instance_id;
	    $instance = Instance::find($id);
		$instance->begin=1;
		$instance->save();
		return Response::json(array(
		'Instance id' => $id,
		'begin status'=>$instance->begin));
	}
	
	public function getbegin($instance_id){
	    $id=(int)$instance_id;
	    $instance = Instance::find($id);
		return $instance->begin;	
	}

	public function showForm(){
		$user = Auth::user()->idUser;
		return View::make('instance.create_instance',array("user"=>$user));
	   
	}

	public function beginSimulationForm(){
		$user = Auth::user()->idUser; 
		$instances=Instance::where('User_idUser', '=', $user)->get();

		/* This should go in a transformer */

		return View::make('instance.begin',array("user"=>$user,"instances"=>$instances));
	   
	}

	public function simulationinprogress($instance_id){
		
		/* This should go in a transformer */

		return View::make('simulation.results',array('instance_id' => $instance_id));
	   
	}

	
}
