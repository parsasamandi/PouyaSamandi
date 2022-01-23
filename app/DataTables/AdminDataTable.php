<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Support\Facades\URL;


class AdminDataTable extends DataTable
{
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
            ->addColumn('action', function (User $user){
                return <<<ATAG
                            <a onclick="showConfirmationModal('{$user->id}')">
                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                            </a>
                            &nbsp;
                            <a onclick="showEditModal('{$user->id}')">
                                <i class="fa fa-edit text-danger" aria-hidden="true"></i>
                            </a>
                        ATAG;
            })
            ->editColumn('name', function (User $user){
                return $user->name;
            })
            ->editColumn('email', function(User $user){
                return $user->email;
            })
            ->editColumn('created_at', function(User $user){
                return $user->created_at;
            })
            ->editColumn('updated_at', function(User $user){
                return $user->updated_at;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('adminTable')
            ->minifiedAjax(route('admin.list.table'))
            ->columns($this->getColumns())
            ->columnDefs(
                [
                    ["className" => 'dt-center text-center', "target" => '_all'],
                ]
            )
            ->searching(true)
            ->info(false)
            ->ordering(true)
            ->responsive(true)
            ->pageLength(8)
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
            Column::make('name')
            ->title('Name'),
            Column::make('email')
            ->title('Email'),
            Column::make('created_at')
            ->title('Created At'),
            Column::make('updated_at')
            ->title('Updated At'),
            Column::computed('action') // This Column is not in database
                ->addClass('column-title')
                ->exportable(false)
                ->searchable(false)
                ->printable(false)
                ->orderable(false)
                ->title('Action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}



