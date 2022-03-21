<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Spatie\Permission\Models\Role;

class Usertable extends LivewireDatatable
{
    public $model = User::class;
    public $table;
    // public $permission;
    // public $hasCreate = true;

    public function columns()
    {
        return [
            Column::name('name')
                ->searchable(),

            Column::name('email'),

            Column::name('roles.name')
                ->label('Roles'),

            Column::callback(['email_verified_at'], function($email_verified_at) {
                    return ($email_verified_at != null) ? 'verfied' : 'unverified';
                })->label('Status'),

            DateColumn::name('created_at')
                ->label('Created'),

            DateColumn::name('updated_at')
                ->label('Updated'),

            // Column::callback(['id'], function ($id) {
            //         $user = User::find($id);
            //         return view('admin.user.action', compact('user'));
            //     })
            //     ->label('Action')
            //     ->alignRight()
            //     ->unsortable()
        ];
    }
}
