<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIpcontaipMedidasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipcontaip_medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcidade', false);
            $table->string('nome_concessionaria', 80);
            $table->string('nome', 80);
            $table->string('compl_nome', 50);
            $table->integer('idsecretaria', false);
            $table->string('num_fatura', 10);
            $table->date('data_vencimento');
            $table->string('endereco_rua_av', 60);
            $table->string('endereco_compl', 60)->nullable();
            $table->string('endereco_bairro', 40);
            $table->string('endereco_municipio_uf_cep', 53);
            $table->decimal('cod_contrato', 10, 0);
            $table->string('num_medidor', 18);
            $table->date('data_leit_anterior');
            $table->date('data_leit_atual');
            $table->decimal('leitura_anterior', 10, 0);
            $table->decimal('leitura_atual', 10, 0);
            $table->decimal('qtd_conceito', 10, 0);
            $table->decimal('diferenca_leituras', 10, 0);
            $table->decimal('constante', 10, 0);
            $table->decimal('consumo', 10, 0);
            $table->string('tensao_fornecimento', 11);
            $table->decimal('multa', 10, 0);
            $table->decimal('juros', 10, 0);
            $table->decimal('outros', 10, 0);
            $table->decimal('variacao_percentual', 10, 0);
            $table->string('tipo_fatura', 3);
            $table->string('cod_tarifa', 10);
            $table->decimal('preco_conceito', 10, 0);
            $table->decimal('valor_final_com_imposto', 10, 0);
            $table->decimal('valor_a_ser_faturado', 10, 0);
            $table->integer('contaipano', false);
            $table->string('contaipmes', 10);
            $table->date('contaipdatainclusao');
            $table->integer('idusuario', false);
            $table->string('novo_contrato_cadastrado', 1)->nullable();
            $table->string('pagamento', 3);
            $table->string('versao_mobile', 1)->nullable();
            $table->string('segmento', 50);
            $table->string('unidade_fiscalizada', 2);
            $table->date('unidade_fiscalizada_data');
            $table->string('unidade_fiscalizada_parecer', 1000)->nullable();
            $table->string('unidade_fiscalizada_observacao', 1000)->nullable();
            $table->string('fatura_numero', 17);
            $table->string('fatura_mes', 2);
            $table->integer('fatura_ano', false);
            $table->integer('idfollowup', false);
            $table->integer('conta_entregue_fisicamente', false);
            $table->string('status_conta_fisica', 1);
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
        Schema::drop('ipcontaip_medidas');
    }
}
