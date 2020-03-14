<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name');
            $table->string('site_slogan')->nullable();
            $table->string('site_description')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_description')->nullable();
            $table->string('footerleft_title')->nullable();
            $table->string('footerright_title')->nullable();
            $table->string('footerleft_desc')->nullable();
            $table->string('footerright_desc')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
