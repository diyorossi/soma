<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSectionTable extends Migration
{
    public function up()
    {
        Schema::create('about_section', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('About Us');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_section');
    }
}