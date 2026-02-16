<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatWeDoSectionTable extends Migration
{
    public function up()
    {
        Schema::create('whatwedo_section', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('What We Do');
            $table->longText('content');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('whatwedo_section');
    }
}