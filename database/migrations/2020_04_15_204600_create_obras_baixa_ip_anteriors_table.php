<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObrasBaixaIpAnteriorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_baixa_ip_anteriors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcidade', false);
            $table->integer('idobras', false);
            $table->integer('idra', false);
            $table->integer('idbairro', false);
            $table->integer('idlogradouro', false);
            $table->integer('idposte', false);
            $table->string('poste_numero', 10);
            $table->decimal('coordenada_x', 10, 0);
            $table->decimal('coordenada_y', 10, 0);
            $table->integer('visavis', false);
            $table->string('referencia', 255)->nullable();
            $table->string('poste_propriedade', 14);
            $table->string('poste_status', 8);
            $table->date('poste_data_instalacao');
            $table->integer('idsuporte', false);
            $table->date('suporte_data_instalacao');
            $table->integer('idluminaria', false);
            $table->integer('luminaria_numero', false);
            $table->string('fase_ligacao', 3)->nullable();
            $table->integer('altura_montagem', false);
            $table->date('luminaria_data_instalacao');
            $table->integer('idlampada', false);
            $table->integer('quantidade_lampada', false);
            $table->decimal('horas_ligada', 10, 0);
            $table->date('lampada_data_instalacao');
            $table->integer('idreator', false);
            $table->date('reator_data_instalacao');
            $table->integer('idrele', false);
            $table->date('rele_data_instalacao');
            $table->integer('idrede', false);
            $table->integer('idtransformador', false);
            $table->integer('idmedidor', false);
            $table->date('medidor_data_instalacao');
            $table->integer('idobjetoiluminado', false);
            $table->integer('idtarifa', false);
            $table->string('observacoes', 1000)->nullable();
            $table->string('situacao', 10)->nullable();
            $table->datetime('data_atualizado')->nullable();
            $table->datetime('incluidoem');
            $table->integer('idusuarioi', false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('obras_baixa_ip_anteriors');
    }
}
