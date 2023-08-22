<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::orderBy('id','DESC')->get();
        return view('admin.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('admin.role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);

        $role = Role::create(['name'=>$request->name,'guard_name'=>'web']);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('success','Role created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permission = Permission::all();
        $role = Role::with('permissions')->find($id);
        $permission_ids = $role->permissions()->pluck('id')->toArray(); // fetch only permission ids
        return view('admin.role.edit',compact('role','permission','permission_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|string|unique:roles,name,$role->id"
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('success','Role Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success','Role has been deleted successfully');
    }
}
