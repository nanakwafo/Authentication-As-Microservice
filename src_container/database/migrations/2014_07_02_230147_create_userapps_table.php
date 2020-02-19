<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 18/02/2020
 * Time: 10:02
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserappsTable extends Migration{
    public function up()
    {

        Schema::create('userapps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->unique('email');
        });
    }

    public function down(){
        Schema::drop('userapps');
    }
}