<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_audios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uploader')
                ->constrained('public.users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('title',255);
            $table->timestamp('start_at', $precision = 0);
            $table->string('audio_url',255)->nullable();
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
        Schema::dropIfExists('tb_audios');
    }
};
