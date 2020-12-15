<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Users::select('user.*','role.role_type')
        ->join('role','role.role_id','user.role_id');
        if(isset($request->search)){

                $user = $user->where('user_name','Like','%'.$request->search.'%');
        }
        if(isset($request->role)){

            $user = $user->where('role_type','Like','%'.$request->role.'%');
    }

        $user = $user->paginate(5);
        return view('user.show')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('user.add')->with('role',$role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                    'role_id' =>'required',
                    'user_name' =>'required',
                    'user_password' =>'required',
                    'user_gender' =>'required',
                    'user_image' => 'required'


            ]


            );

            try {


                $user_image = $request->file('user_image');
                if (isset($user_image)) {
                    $user_image_name = $user_image->getClientOriginalName();
                    $user_image_name = str_replace(" ", "_", time().$user_image_name);
                    $user_image_path = 'upload/StudentImage/';
                   $user_image->move($user_image_path, $user_image_name);

                }
                else{
                    return back()->withError('no image found');
                }
        $user = new Users();
        $user->role_id = $request->role_id;
        $user->user_name = $request->user_name;
        $user->user_password = $request->user_password;
        $user->user_gender = $request->user_gender;
        $user->user_image_name = $user_image_name;
        $user->user_image_path = $user_image_path;
        $user->created_at  = Carbon::now('PKT');
        $user->updated_at  = Carbon::now('PKT');
        $user->save();

        return redirect()->route('user.show');

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
    public function edit($user_id)
    {
        $role = Role::all();
        $user = Users::where('user_id',$user_id)->first();
        return view("user.edit")->with('user',$user)->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $request->validate(

            [

                    'user_name' =>'required',
                    'user_password' =>'required',
                    'user_gender' =>'required',




            ]


            );

        $user = Users::where('user_id',$user_id)->update


        (

            [

                'role_id'=>$request->role_id,
                'user_name'=>$request->user_name,
                'user_password'=>$request->user_password,
                'user_gender'=>$request->user_gender,

            ]

        );
                    return redirect()->route("user.show");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = users::where('user_id',$user_id)->delete();

        return redirect()->route('user.show');
    }

    public function updateImage(Request $request, $user_id){


        try {

            $user = users::where('user_id', $user_id)->first();
            if (File::exists($user->user_image_path . $user->user_image_name)) {
                File::delete($user->user_image_path . $user->user_image_name);
            }
            $user_image = $request->file('user_image');
            if (isset($user_image)) {
                $user_image_name = $user_image->getClientOriginalName();
                $user_image_name = str_replace(" ", "_", time().$user_image_name);
                $user_image_path = 'upload/StudentImage/';
               $user_image->move($user_image_path, $user_image_name);

            }
            else{
                return back()->withError('Please select image');
            }

            $user->user_image_path =$user_image_path;
            $user->user_image_name =  $user_image_name;
            if ($user->save()) {
                return redirect()->route('user.edit', $user_id);
            } else {
                return back()->withError('something went wrong');
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withinput();
        }
        }
        }



