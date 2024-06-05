<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', 'product.action')
    //         ->setRowId('id');
    // }


    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('description', function ($row) {
                return $row->description; // Render description as raw HTML
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '
                    <form id="delete-form-' . $row->id . '" action="' . route("product.destroy", $row->id) . '" method="POST">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="' . route("product.edit", $row->id) . '" class="edit btn btn-success btn-sm mr-2">Edit</a>
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="button"
                            data-delete-url="'.route('product.destroy',  $row->id ) .'"
                            onclick="confirmDelete(\'product\', ' . $row->id . ', window.LaravelDataTables[\'product-table\'] )"
                            class="delete_'. $row->id .' btn btn-danger btn-sm">Delete</button>
                        </div>
                    </form>
                ';
                return $actionBtn;
            })
            ->rawColumns(['description', 'action']); // Specify both description and action columns as raw HTML
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()->with('category', 'color', 'brand');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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

            Column::make('category_id')
                ->title('Category')
                ->data('category.name')
                ->defaultContent('No Category'),

            Column::make('color_id')
                ->title('Color')
                ->data('color.name')
                ->defaultContent('No Color'),

            Column::make('brand_id')
                ->title('Brand')
                ->data('brand.name')
                ->defaultContent('No Brand'),

            Column::make('description'),
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
        return 'Product_' . date('YmdHis');
    }
}
