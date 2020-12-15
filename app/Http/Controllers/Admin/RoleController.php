<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view("role.show")->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $role = new Role();
            $role->role_type = $request->role_type;
            $role->created_at  = Carbon::now('PKT');
            $role->updated_at  = Carbon::now('PKT');
            $role->save();

            return redirect()->route('role.show');

        }

        catch(Exception $ex){
            return back()->withError($ex->getMessage())->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role_id)
    {
        $role = Role::where('role_id',$role_id)->first();
        return view("role.edit")->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role_id)
    {
        {
             $role = Role::where('role_id',$role_id)->update
  (

                [
                    'role_type'=>$request->role_type,
                    ]

            );
                        return redirect()->route("role.show");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role_id)
    {
        $role = Role::where('role_id',$role_id)->delete();

        return redirect()->route('role.show');
    }
}
