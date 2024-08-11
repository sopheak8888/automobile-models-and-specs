<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobiles', function (Blueprint $table) {
            $table->id();
            $table->string('url_hash')->unique();
            $table->longText('url');
            $table->bigInteger('brand_id')->unique();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->longText('press_release')->nullable();
            $table->longText('photos')->nullable();
            $table->timestamps();
            if (!Schema::hasColumn('automobiles', 'url_hash')) $table->index('url_hash');
            if (!Schema::hasColumn('automobiles', 'brand_id')) $table->index('brand_id');
            if (!Schema::hasColumn('automobiles', 'name')) $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automobiles');
    }
}
