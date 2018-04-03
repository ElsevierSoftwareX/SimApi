<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSensorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			$sql ="DROP TABLE `Sensor`;";
			DB::statement($sql);
			$sql="CREATE TABLE `Sensor` (
				  `id` bigint(10) NOT NULL AUTO_INCREMENT,
				  `idSensor` int(11) NOT NULL,
				  `name` varchar(45) NOT NULL,
				  `room` varchar(45) DEFAULT NULL,
				  `Timestep_idTimestep` int(11) NOT NULL,
				  `Timestep_Instance_idInstance` int(11) NOT NULL,
				  `Environment` double DEFAULT NULL,
				  `Kitchen` double DEFAULT NULL,
				  `Living` double DEFAULT NULL,
				  `Corridor` double DEFAULT NULL,
				  `Study` double DEFAULT NULL,
				  `Bath1` double DEFAULT NULL,
				  `Bedroom1` double DEFAULT NULL,
				  `Bedroom2` double DEFAULT NULL,
				  `Bedroom3` double DEFAULT NULL,
				  `Bedroom4` double DEFAULT NULL,
				  `Bath2` double DEFAULT NULL,
				  `StorageTankHeating1` double DEFAULT NULL,
				  `StorageTankHeating2` double DEFAULT NULL,
				  `EMS_PVProductionEMS` double DEFAULT NULL,
				  `EMS_BuildingConsumption` double DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
			return DB::statement($sql);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		$sql ="DROP TABLE `Sensor`;";
		DB::statement($sql);
		$sql="CREATE TABLE `Sensor` (
			  `idSensor` int(11) NOT NULL,
			  `name` varchar(45) NOT NULL,
			  `room` varchar(45) DEFAULT NULL,
			  `Timestep_idTimestep` int(11) NOT NULL,
			  `Timestep_Instance_idInstance` int(11) NOT NULL,
			  `Environment` double DEFAULT NULL,
			  `Kitchen` double DEFAULT NULL,
			  `Living` double DEFAULT NULL,
			  `Corridor` double DEFAULT NULL,
			  `Study` double DEFAULT NULL,
			  `Bath1` double DEFAULT NULL,
			  `Bedroom1` double DEFAULT NULL,
			  `Bedroom2` double DEFAULT NULL,
			  `Bedroom3` double DEFAULT NULL,
			  `Bedroom4` double DEFAULT NULL,
			  `Bath2` double DEFAULT NULL,
			  `StorageTankHeating1` double DEFAULT NULL,
			  `StorageTankHeating2` double DEFAULT NULL,
			  `EMS_PVProductionEMS` double DEFAULT NULL,
			  `EMS_BuildingConsumption` double DEFAULT NULL,
			  PRIMARY KEY (`Timestep_idTimestep`,`idSensor`,`Timestep_Instance_idInstance`)
			) ENGINE=MyISAM AUTO_INCREMENT=771 DEFAULT CHARSET=latin1;";
		return DB::statement($sql);



	}

}
