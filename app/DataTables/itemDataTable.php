<?php

namespace App\DataTables;

use App\Models\item;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class itemDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'items.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\item $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(item $model)
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
            'produto' => new Column(['title' => __('models/items.fields.produto'), 'data' => 'produto'])
,
            'marca' => new Column(['title' => __('models/items.fields.marca'), 'data' => 'marca'])
,
            'unidade' => new Column(['title' => __('models/items.fields.unidade'), 'data' => 'unidade'])
,
            'quantidade' => new Column(['title' => __('models/items.fields.quantidade'), 'data' => 'quantidade'])
,
            'preco_total' => new Column(['title' => __('models/items.fields.preco_total'), 'data' => 'preco_total'])
,
            'ordem_de_servico_id' => new Column(['title' => __('models/items.fields.ordem_de_servico_id'), 'data' => 'ordem_de_servico_id'])

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'itemsdatatable_' . time();
    }
}
