<?php

/*
 if there is a new sensor value
 return it back to user
 if not check if begin is still 1 which means the simulation is still running
 if so go check if there is a new value agian
 if begin is 2
 then end simulation
*/

class SensorController extends BaseController {
public function getSensor($instance_id,$sensor_id,$timestep_id)
	{   
	    $sensor = DB::table('Sensor')
		->where('idSensor', $sensor_id)
		->where('Timestep_idTimestep', $timestep_id)
		->where('Timestep_Instance_idInstance', $instance_id)
		->first();
		if ($sensor){
		  $TOut=$sensor->TOut;
		  $TRoom=$sensor->TRoom;
	      return Response::json(array(
		  'Sensor_id' => $sensor_id,
	      'Timestep' => $timestep_id,
		  'Instance_id'=> $instance_id,
	      'Temperature_out' => $TOut,
		  'Temperature_room' => $TRoom
		  ));
		  }
		  return "Sensor Not found"; 
  		
	}

	public function getSensorLast($instance_id)
	{   
	    $sensor = DB::table('Sensor')
		->where('Timestep_Instance_idInstance', $instance_id)
		->orderBy('Timestep_idTimestep', 'DESC')
		->take(10)->get();
		if ($sensor){
		  $TOut=$sensor->TOut;
		  $TRoom=$sensor->TRoom;
	      return Response::json(array(
		  'StorageTankHeating1' => $sensor->StorageTankHeating1,
	      'Timestep' => $sensor->Timestep_idTimestep,
		  'Environment'=> $sensor->Environment,
	      'Bedroom1' => $sensor->Bedroom1,
		  'EMS_BuildingConsumption' => $sensor->EMS_BuildingConsumption
		  ));
		  }
		  return "Sensor Not found"; 
  		
	}

	public function getSensorInstance($instance_id)
	{   
	    $results =  DB::table('Sensor')->where('Timestep_Instance_idInstance', $instance_id)->take(100)->get();
		
		
		 
		return View::make('instance.results',array("instance"=>$instance_id,"results"=>$results));
  		
	}
}