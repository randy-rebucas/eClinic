<div>
    <livewire:datatable
    model="App\Models\User"
    name="users"
    searchable="name"
    exclude="updated_at"
    hidden="email_verified_at"
    hideable="select"
    permission="users-create"
/>
{{-- <livewire:tables.usertable
    table="user"
    earchable="name"
    exclude="updated_at"
    hidden="email_verified_at"
    hideable="select"
    permission="users-create"/> --}}
</div>
