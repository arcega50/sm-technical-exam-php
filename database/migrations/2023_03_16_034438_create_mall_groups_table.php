<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_mall', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mall_id");
            $table->unsignedBigInteger("group_id");
            $table->timestamps();
            $table->foreign("mall_id")->references("id")->on("malls")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("group_id")->references("id")->on("groups")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_mall');
    }
};
