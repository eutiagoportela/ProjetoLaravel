<?php

use App\Models\Medicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_especialidades', function (Blueprint $table) {
            $table->foreignId('especialidades_id')->constrained('Especialidades');
            $table->foreignId('medicos_id')->constrained('Medicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos_especialidades');
    }
}
