<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSensorChecked extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::table('Sensor', function($table)
        { 
        	$table->dropColumn('checked');
        });
		 Schema::table('Sensor', function($table)
        { 
        	$table->integer('checked');
        });
	}

	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::table('Sensor', function($table)
        { 
        	$table->dropColumn('checked');
        });
		 Schema::table('Sensor', function($table)
        { 
            $table->boolean('checked');
        });

	}

}
