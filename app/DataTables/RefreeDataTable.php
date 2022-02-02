<?php

namespace App\DataTables;

use App\Models\Refree;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
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
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->editColumn('image', function (Refree $refree) {
                return "<img src=/images/". $refree->image ." height='auto' width='60%' />";
            })
            ->editColumn('link', function (Refree $refree) {
                return <<<ATAG
                            <a href="$refree->link">Open the link</a>
                        ATAG;
            })
            ->addColumn('description', function (Refree $refree) {
                return Str::limit(optional($refree->explanations)->explanation, 80, '(details)');
            })
            ->filterColumn('description', function($query, $keyword) {
                return $this->dataTable->filterColumn($query, 
                    'id in (select explanation_id from explanations where explanation like ?)', $keyword);
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
            Column::make('DT_RowIndex')
            ->title('#')                                       
                ->searchable(false)
                ->orderable(false),
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
