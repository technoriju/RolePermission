<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Role,Permission};
use App\Models\User;
use DB;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:user list'])->only(['index']);
        $this->middleware(['permission:create user'])->only(['create']);
        $this->middleware(['permission:edit user'])->only(['edit']);
        $this->middleware(['permission:delete user'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('roles')->latest()->get();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$permission = Permission::all();
        $role = Role::all();
        return view('admin.user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' =>'required|min:6|confirmed',
            'status' => 'required',
            'role.*' => 'required'
        ]);

        DB::beginTransaction();
        try {

           $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status
            ]);
            $user->syncRoles($request->role);
            DB::commit();
            return redirect()->back()->with('success','User data added successfully');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Something went wrong!');
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
        $role = Role::orderBy('id','DESC')->get();
        $user = User::with('roles')->find($id);
        $roles = $user->roles()->pluck('id')->toArray(); // fetch only permission ids
        return view('admin.user.edit',compact('role','roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'phone' => "required|digits:10|unique:users,phone,$user->id",
            'email' => "required|email|unique:users,email,$user->id",
            'password' =>'nullable|min:6|confirmed',
            'status' => 'required',
            'role.*' => 'required'
        ]);

        DB::beginTransaction();
        try {

           $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status
            ]);

            if($request->has('password')):
                $user->update(['password' => Hash::make($request->password)]);
            endif;

            $user->syncRoles($request->role);
            DB::commit();

            return redirect()->back()->with('success','User data updated successfully');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $user = User::find($id);
            $user->delete();
            DB::commit();
            return redirect()->back()->with('success','User has been deleted successfully');

        } catch(\Exception $e) {

            DB::rollback();
            return redirect()->back()->with('error','User Deleted Fail!');
        }
    }
}
