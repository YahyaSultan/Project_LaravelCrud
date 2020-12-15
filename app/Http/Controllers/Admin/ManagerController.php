<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use Carbon\Carbon;
use Exception;
use App\Models\Role;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manager = Manager::select('manager.*','role.role_type')
        ->join('role','role.role_id','manager.role_id');
        if(isset($request->search_manager)){

            $manager = $manager->where('manager_name','Like','%'.$request->search_manager.'%');
    }
    if(isset($request->role_manager)){

        $manager = $manager->where('role_type','Like','%'.$request->role_manager.'%');
}
            $manager = $manager->paginate(5);
        return view('manager.show')->with('manager',$manager);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('manager.add')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(

        //     [
        //             'role_id' =>'required',
        //             'manager_name' =>'required',
        //             'user_password' =>'required',
        //             'user_gender' =>'required',
        //             'user_image' => 'required'


        //     ]


        //     );

            try {



        $manager = new Manager();
        $manager->role_id = $request->role_id;
        $manager->manager_name = $request->manager_name;
        $manager->manager_designation = $request->manager_designation;
        $manager->manager_password = $request->manager_password;
        $manager->created_at  = Carbon::now('PKT');
        $manager->updated_at  = Carbon::now('PKT');
        $manager->save();

        return redirect()->route('manager.show');

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
    public function edit($manager_id)
    {
        $role = Role::all();
        $manager = Manager::where('manager_id',$manager_id)->first();
        return view("manager.edit")->with('manager',$manager)->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $manager_id)
    {
        $request->validate(

            [

                    'manager_name' =>'required',
                    'manager_designation' =>'required',
                    'manager_password' =>'required',




            ]


            );

        $manager = Manager::where('manager_id',$manager_id)->update


        (

            [

                'role_id'=>$request->role_id,
                'manager_name'=>$request->manager_name,
                'manager_designation'=>$request->manager_designation,
                'manager_password'=>$request->manager_password,

            ]

        );
                    return redirect()->route("manager.show");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($manager_id)
    {
        $manager = Manager::where('manager_id',$manager_id)->delete();

        return redirect()->route('manager.show');
    }

}
