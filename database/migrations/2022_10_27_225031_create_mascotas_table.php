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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('edad');
            $table->foreignId('usuario_id')->constrained();
            $table->timestamps();

            // $table->unsignedBigInteger('usuario_id');
            // $table->foreignId('usuario_id')->references('id')->on('usuarios');
        });
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};
