<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function viewRole() {
        $data = [

            'roles' => Role::where('name', '!=', 'super admin')->get()
        ];
        return view('admin.roles.roles', $data, ["title" => "Roles"]);
    }

    public function view_add_role() {
        return view('admin.roles.add_role');
    }

    public function addRole(Request $request) {
        Role::create([
            'name' => $request->namaRole,
            'guard_name' => 'web',
        ]);

        return redirect()->route('roleView')->with('info', 'Role berhasil ditambahkan');
    }

    public function deleteRole($id) {
        $delete = Role::find($id);
        $delete->delete();

        return redirect()->route('roleView')->with('info', 'Role berhasil dihapus!');
    }

    public function updateRole(Request $request, $id) {
        Role::where('id', $request->id)->update([
            'name' => $request->namaRole,
        ]);

        return redirect()->route('roleView')->with('info', 'Role berhasil diupdate!');
    }

    public function viewEditRole($id) {
        $editRole = Role::find($id);
        return view('admin.roles.edit_role', compact('editRole'));
    }

    
    //PERMISION ADMIN
    
    public function addPermission() {
        return view('admin.roles.add_permission');
    }

    public function viewPermission($id) {
        $permissions = Permission::all();

        return view('admin.roles.permissions', [
            'role' => Role::findOrFail($id),
            'permissions' => $permissions,
            'title' => 'Permission'
        ]);
    }

    public function inputPermission(Request $request, $id) {
        // dd($request);
        $role = Role::find($id);
        $role->syncPermissions($request->permission);

        return redirect()->route('roleView')->with('info', 'Berhasil mengubah permission!');
    }
}
