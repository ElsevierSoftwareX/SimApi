<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResultsView extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			/*
			$sql="SELECT Timestep_Instance_idInstance,
					       TRUNCATE(Timestep_idTimestep/4,0) as Hours,
						   AVG(Environment) as OutdoorAir, 
						   AVG(Kitchen) as KitchenTemp, 
					       AVG(Corridor) as CorridorTemp,
					       AVG(Bedroom1) as Bed1Temp,
					       AVG(Bedroom2) as Bed2Temp,
					       AVG(Bedroom3) as Bed3Temp,
						   SUM(EMS_PVProductionEMS)*0.0000002778 as PVkWh,
						   SUM(EMS_BuildingConsumption)*0.0000002778 as BuildingConsumptionKwh
					FROM simapi_db1.Sensor
					GROUP BY Timestep_Instance_idInstance, Hours;";
			return DB::statement($sql);*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		//
		



	}

}
