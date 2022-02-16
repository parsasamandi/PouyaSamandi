<?php

namespace App\DataTables\Refree;

use App\Models\Refree;
use Yajra\DataTables\Html\Button; 
use Yajra\DataTables\Html\Column;
use App\Datatables\GeneralDataTable;
use Yajra\DataTables\Services\DataTable;
use \Illuminate\Support\Str;

class RefreeDataTable extends DataTable
{
    public $dataTable;

    public function __construct() {
        $this->dataTable = new GeneralDataTable();
    }
    
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action', 'link', 'image'])
            ->addIndexColumn()
            ->editColumn('image', function (Refree $refree) {
                return "<img src=/images/". $refree->image ." height='auto' width='60%' />";
            })
            ->editColumn('link', function (Refree $refree) {
                return "<a href='$refree->link'>Link address</a>";
            })
            ->addColumn('description', function (Refree $refree) {
                return Str::limit(optional($refree->explanations)->explanation, 80, ' (details)');
            })
            ->filterColumn('description', function($query, $keyword) {
                return $this->dataTable->filterDescriptioncCol($query, $keyword);
            })
            ->addColumn('action', function (Refree $refree) {
                return $this->dataTable->setAction($refree->id);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Refree $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Refree $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->dataTable->tableSetting($this->builder(), 
                $this->getColumns(), 'refree');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            $this->dataTable->getIndexCol(),
            Column::make('name')
            ->title('Name'),
            Column::make('image')
            ->title('Image'),
            Column::make('link')
            ->title('Link'),
            Column::computed('description')
            ->title('Description'),
            $this->dataTable->setActionCol('| Edit')
        ];
    }
}
