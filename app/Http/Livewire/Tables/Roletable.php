<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Spatie\Permission\Models\Role;

class Roletable extends LivewireDatatable
{
    public $model = Role::class;
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

            // Column::name('users')
            //     ->label('Users')
            //     ->searchable(),

            // Column::delete()->alignRight(),
            // Column::callback(['id'], function ($id) {
            //         $role = Role::findById($id);
            //         return view('admin.role.action', compact('role'));
            //     })
            //     ->label('Action')
            //     ->alignRight()
            //     ->unsortable()
        ];
    }
}
