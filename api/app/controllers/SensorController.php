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
		//->where('checked', 0)
		->orderBy('Timestep_idTimestep', 'DESC')
		->take(3)->get();
		
		
		if ($sensor){
		  	return $sensor;
		  }
		  return null; 
  		
	}

	public function getSensorInstance($instance_id=136,$resolution=3,$group=24)
	{   
		// Get group - give the days aggregation 1/2/7
		$group = Input::get('group');
		// Get resolution give the timestep - 15/30/60 minutes
		$resolution = Input::get('resolution');
		
		$instance_id = Input::get('instance_id');

		/*
		// compare with other simulations so assign the simulation id
		$maxchecked = $name = DB::table('Sensor')
		->where('Timestep_Instance_idInstance',$instance_id)
		->groupBy('checked')
		->max('checked');
		*/

		//if (!is_numeric($maxchecked)) $maxchecked=0;
		if (!is_numeric($resolution)) $resolution=3;
		if (!is_numeric($group)) $group=24;
		$appr = $resolution;
		switch ($resolution) {
			    case 1:
			        $ht = 1;
			        $appr=0;
			        break;
			    case 2:
			         $ht = 2;
			        break;
			    case 3:
			        $ht = 4;
			        break;
			    default:
			    	$resolution=3;
			    	$ht=4;
			}

		$appg =$group;
		switch ($group) {
			    case 1:
			        $appg = 24*(4-$appr);
			        break;
			    case 2:
			         $appg = 48*(4-$appr);
			        break;
			    case 3:
			        $appg = 168*(4-$appr);
			        break;
			    default:
			    	$appg = 24*(4-$appr);
			    	
			}

		// a little bit of check			
		


		// Shit code to rewrite  
		$hr=$appg;
		

	    $results =  DB::table('Sensor')
	    //->where('checked','<>',0)
	    ->where('Timestep_Instance_idInstance',$instance_id)
	    ->select('*', DB::raw('FLOOR((Timestep_idTimestep DIV ?) MOD ?) as Time,(((Timestep_idTimestep DIV ?) MOD ?)+(4 DIV ?)) DIV (4 DIV ?) as Hour, FLOOR((((Timestep_idTimestep DIV ?) MOD ?)+(4 DIV ?)) DIV (4 DIV ?) DIV 24) as Day,ROUND(sum(EMS_PVProductionEMS/3600000),2) as PVProd, ROUND(avg(Kitchen),2) as KitchenT, ROUND(avg(Environment),2) as Outdoor,ROUND(sum(EMS_BuildingConsumption/3600000),2) as BuildingConsumption'))
        ->setBindings([$ht,$hr,$ht,$hr,$ht,$ht,$ht,$hr,$ht,$ht,$instance_id])
        ->groupBy('Time')
        ->orderBy('Time','ASC')
	    ->take(300)->get();
	    
	    // update with max checked
	    /*
	    $maxchecked++;
		$affectedRows = Sensor::where('Timestep_Instance_idInstance', $instance_id)
		->where('checked','=', 0)
		->update(array('checked' => $maxchecked));

		/*
		// Other simulations
		$othersim =  DB::table('Sensor')
		->where('checked','<>', 0)
	    ->where('Timestep_Instance_idInstance',$instance_id)
	    ->select('*', DB::raw('FLOOR((Timestep_idTimestep DIV ?) MOD ?) as Time,(((Timestep_idTimestep DIV ?) MOD ?)+(4 DIV ?)) DIV (4 DIV ?) as Hour, CASE WHEN Timestep_idTimestep=? THEN 1 ELSE FLOOR(((Timestep_idTimestep DIV ?) DIV ?)+1)  END as Day,sum(EMS_PVProductionEMS/3600000) as PVProd, avg(Kitchen) as KitchenT, avg(Environment) as Outdoor,sum(EMS_BuildingConsumption/3600000) as BuildingConsumption'))
        ->setBindings([$ht,$hr,$ht,$hr,$ht,$ht,$hr,4,24,$instance_id,0])
        ->groupBy('Time')
        ->orderBy('Time','ASC')
	    ->take(300)->get();*/

	    $maxenergyc = 0;
	    $maxenergypv=0;
	    $totalcon=0;
	    $minenergy=100;

	    foreach ($results as $value) {

   						 $totalcon =$totalcon+round($value->BuildingConsumption,2);
   						 if ($value->PVProd > $maxenergypv) $maxenergypv =round($value->PVProd,2);
   						 if ($value->BuildingConsumption > $maxenergyc) $maxenergyc = round($value->BuildingConsumption,2);
   						 if ($value->BuildingConsumption < $minenergy &&  $value->BuildingConsumption>0)  $minenergy =round($value->BuildingConsumption,2);
				}


		
		return View::make('instance.results',array("instance"=>$instance_id,"results"=>$results,"resolution"=>$resolution,"group"=>$group,"maxenergyc"=>$maxenergyc,"maxenergypv"=>$maxenergypv,"totalcon"=>$totalcon,"minenergy"=>$minenergy));
  		
	}
}