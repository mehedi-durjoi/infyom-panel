<?php

namespace App\DataTables;

use App\Models\datosDoUsuario;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class datosDoUsuarioDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'datos_do_usuarios.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\datosDoUsuario $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(datosDoUsuario $model)
    {
        if(method_exists($model, 'relationsName') && count($model->relationsName()) > 0){
            return $model->newQuery()->with($model->relationsName());
        }
        else {
            return $model->newQuery();
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'scrollX' => true,
                'stateLoaded' => 'function (settings, data) { $.fn.dataTable.ext.errMode = \'none\'; }',
                'responsive' => true,
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nome' => new Column(['title' => __('models/datosDoUsuarios.fields.nome'), 'data' => 'nome'])
,
            'email' => new Column(['title' => __('models/datosDoUsuarios.fields.email'), 'data' => 'email'])
,
            'senha' => new Column(['title' => __('models/datosDoUsuarios.fields.senha'), 'data' => 'senha'])
,
            'tipo' => new Column(['title' => __('models/datosDoUsuarios.fields.tipo'), 'data' => 'tipo'])
,
            'telefone_ddd' => new Column(['title' => __('models/datosDoUsuarios.fields.telefone_ddd'), 'data' => 'telefone_ddd'])
,
            'telefone_numero' => new Column(['title' => __('models/datosDoUsuarios.fields.telefone_numero'), 'data' => 'telefone_numero'])
,
            'empresa' => new Column(['title' => __('models/datosDoUsuarios.fields.empresa'), 'data' => 'empresa'])
,
            'cargo_setor' => new Column(['title' => __('models/datosDoUsuarios.fields.cargo_setor'), 'data' => 'cargo_setor'])
,
            'direcionar' => new Column(['title' => __('models/datosDoUsuarios.fields.direcionar'), 'data' => 'direcionar'])
,
            'mensagem_instantanea' => new Column(['title' => __('models/datosDoUsuarios.fields.mensagem_instantanea'), 'data' => 'mensagem_instantanea'])
,
            'receber_sms' => new Column(['title' => __('models/datosDoUsuarios.fields.receber_sms'), 'data' => 'receber_sms'])
,
            'w_acesso_whatsapp' => new Column(['title' => __('models/datosDoUsuarios.fields.w_acesso_whatsapp'), 'data' => 'w_acesso_whatsapp'])
,
            'w_menu_consultas' => new Column(['title' => __('models/datosDoUsuarios.fields.w_menu_consultas'), 'data' => 'w_menu_consultas'])

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'datos_do_usuariosdatatable_' . time();
    }
}
