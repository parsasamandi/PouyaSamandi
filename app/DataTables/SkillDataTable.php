<?php

namespace App\DataTables;

use App\Models\Skill;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SkillDataTable extends DataTable
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
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->editColumn('title', function (Skill $skill) {
                return $skill->title;
            })
            ->addColumn('description', function (Skill $skill) {
                foreach($skill->explanations as $description) {
                    return $description->explanation;
                }
            })
            ->addColumn('action', function (Skill $skill) {
                return $this->dataTable->setAction($skill->id);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Skill $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Skill $model)
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
        return $this->builder()
            ->setTableId('skillTable')
            ->columns($this->getColumns())
            ->minifiedAjax(route('skill.list.table'))
            ->dom('Bfrtip')
            ->searching(true)
            ->info(false)
            ->ordering(true)
            ->responsive(true)
            ->pageLength(6)
            ->dom('PBCfrtip')
            ->orderBy(1);
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
            Column::make('title')
            ->title('Title'),
            Column::computed('description') // This column is not in database
            ->title('Description'),
            $this->dataTable->setActionCol('| Edit')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Skill_' . date('YmdHis');
    }
}
