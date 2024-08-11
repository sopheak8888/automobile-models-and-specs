<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('other_id')->unique()->comment('Engine id on autoevolution');
            $table->bigInteger('automobile_id')->unique();
            $table->string('name')->unique();
            $table->longText('specs')->nullable();
            $table->timestamps();
            if (!Schema::hasColumn('engines', 'other_id')) $table->index('other_id');
            if (!Schema::hasColumn('engines', 'automobile_id')) $table->index('automobile_id');
            if (!Schema::hasColumn('engines', 'name')) $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engines');
    }
}
