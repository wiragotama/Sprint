<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password', 60);
            $table->string('address',60);
            $table->string('role',20)->default('customer'); //admin, agent, customer
            $table->timestamps();
        });

        Schema::create('files', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('filename',60); 
            $table->string('filePath'); //absolute filePath saat menyimpan file
            $table->string('uploaderName'); //customer
            $table->string('agentName'); //printing agent name
            $table->string('deliveryAddress')->default(' ');
            $table->string('printType',8)->default('doc'); //doc atau poster
            $table->string('paperSize',3)->default('A4'); //{A4, A3, A0}
            $table->integer('numPages')->default(0);
            $table->integer('harga');
            $table->string('status',10)->default('In Queue'); //{In Queue, Printed, Delivered}
            $table->string('mime');
            $table->timestamps();
        });

        Schema::create('status', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('status'); //{In Queue, Printed, Delivered}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('files');
        Schema::drop('status');
    }
}
