<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Spatie\Permission\Models\Permission;

class Permissiontable extends LivewireDatatable
{
    public $model = Permission::class;
    public $table;

    public function columns()
    {

        return [
            // NumberColumn::name('id')
            //     ->label('ID'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable(),

            Column::name('guard_name')
                ->label('Guard')
                ->searchable(),

            // Column::delete()->alignRight(),
            // Column::callback(['id'], function ($id) {
            //         $permission = Permission::findById($id);
            //         return view('admin.permission.action', compact('permission'));
            //     })
            //     ->label('Action')
            //     ->alignRight()
            //     ->unsortable()
        ];
    }
}
