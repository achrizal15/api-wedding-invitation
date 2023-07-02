<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up () : void
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->uuid()->primary();
            $table->string('parent_id')
            ->default(null)
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('comments')
            ->onDelete('cascade');
            $table->string("name");
            $table->boolean("presence")->default(false);
            $table->longText("detail");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists('comments');
    }
};