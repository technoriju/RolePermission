<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role,Permission};
use DB;

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

        DB::beginTransaction();
        try {

            $role = Role::create(['name'=>$request->name,'guard_name'=>'web']);
            $role->syncPermissions($request->permission);
            DB::commit();
            return redirect()->back()->with('success','Role created!');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Something went wrong! Please try again later');
        }
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
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => "required|string|unique:roles,name,$id"
        ]);

        DB::beginTransaction();
        try {

            $role = Role::find($id);
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permission);
            DB::commit();
            return redirect()->back()->with('success','Role Updated!');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Role Updated Fail!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $role = Role::find($id);
            $role->delete();
            DB::commit();
            return redirect()->back()->with('success','Role has been deleted successfully');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Role Deleted Fail!');
        }

    }
}
