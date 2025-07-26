<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\EditRoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $methodsToConvert = ['store', 'update'];

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(AddRoleRequest $request)
    {
        $data = $request->validated();
        $data['guard_name'] = 'web';

        Role::create($data);
        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(EditRoleRequest $request, Role $role)
    {
        $data = $request->validated();

        $role->update($data);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        if ($role->protected) {
            return redirect()->back();
        }
        $role->delete();
        return redirect()->back();
    }
}
