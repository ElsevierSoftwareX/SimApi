<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		$sql="SET FOREIGN_KEY_CHECKS=0;";
		DB::statement($sql);
		$sql="DROP TABLE IF EXISTS `Actions`;";
		DB::statement($sql);

		$sql="CREATE TABLE `Actions` (
			  `idActions` int(11) NOT NULL AUTO_INCREMENT,
			  `action` int(11) NOT NULL,
			  `Timestep_idTimestep` int(11) NOT NULL,
			  `Timestep_Instance_idInstance` int(11) NOT NULL,
			  `StorageTankSetPoint_Override` double DEFAULT NULL,
			  `CirculationPumpHeatLoop` double DEFAULT NULL,
			  PRIMARY KEY (`idActions`),
			  UNIQUE KEY `idActions_UNIQUE` (`idActions`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		DB::statement($sql);
		
		$sql="SET FOREIGN_KEY_CHECKS=1;";
		return DB::statement($sql);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$sql="DROP TABLE IF EXISTS `Actions`;";
		DB::statement($sql);
		$sql="CREATE TABLE IF NOT EXISTS `Actions` (
			  `idActions` int(11) NOT NULL AUTO_INCREMENT,
			  `action` int(11) NOT NULL,
			  `Timestep_idTimestep` int(11) NOT NULL,
			  `Timestep_Instance_idInstance` int(11) NOT NULL,
			  `StorageTankSetPoint_Override` double DEFAULT NULL,
			  `CirculationPumpHeatLoop` double DEFAULT NULL,
			  PRIMARY KEY (`idActions`,`Timestep_idTimestep`,`Timestep_Instance_idInstance`),
			  UNIQUE KEY `idActions_UNIQUE` (`idActions`),
			  KEY `fk_Actions_Timestep1_idx` (`Timestep_idTimestep`,`Timestep_Instance_idInstance`),
			  KEY `fk_Actions_Timestep2_idx` (`Timestep_Instance_idInstance`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;";

		return DB::statement($sql);
		



	}

}
