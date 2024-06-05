<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', 'category.action')
    //         ->setRowId('id');
    // }

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn(
                'action',
                function ($row) {

                    $actionBtn = '
                    <form id="delete-form-' . $row->id . '" action="' . route("category.destroy", $row->id) . '" method="POST">
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="' . route("category.edit", $row->id) . '" class="edit btn btn-success btn-sm mr-2">Edit</a>
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <button type="button"
                    data-delete-url="'.route('category.destroy',  $row->id ) .'"
                    onclick="confirmDelete(\'category\', ' . $row->id . ', window.LaravelDataTables[\'category-table\'] )"
                    class="delete_'. $row->id .' btn btn-danger btn-sm">Delete</button>
                    </div>
                    </form>
                    ';
                    return $actionBtn;
                }
            )
            ->rawColumns(['action'])
            ->addIndexColumn();
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
    return $model->with('parent')->newQuery();
    // return $model->newQuery();
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('parent_id') // Add parent_name column
            ->title('Parent Category') // Optional: Set the column title
            ->data('parent.name') // Specify the relationship path to parent's name
            ->defaultContent('Main Category') // Optional: Set default content if parent doesn't exist
            ->orderable(false), // Optional: Disable sorting on this column
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }


}
