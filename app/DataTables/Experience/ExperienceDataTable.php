<?php

namespace App\DataTables\Experience;

use App\Models\Experience;
use Yajra\DataTables\Html\Button; 
use Yajra\DataTables\Html\Column;
use App\Datatables\GeneralDataTable;
use Yajra\DataTables\Services\DataTable;
use Str;

class ExperienceDataTable extends DataTable
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
            ->addColumn('description', function (Experience $experience) {
                foreach($experience->explanations as $description) {
                    return $description->explanation;
                }
            })
            ->filterColumn('description', function($query, $keyword) {
                return $this->dataTable->filterDescriptioncCol($query, $keyword);
            })
            ->addColumn('action', function (Experience $experience) {
                return $this->dataTable->setAction($experience->id);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Experience $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Experience $model)
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
                $this->getColumns(), 'experience');
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
            Column::make('headline')
            ->title('Headline'),
            Column::computed('description')
            ->title('Description'),
            $this->dataTable->setActionCol('| Edit')
        ];
    }
}
