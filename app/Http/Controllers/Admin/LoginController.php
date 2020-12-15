<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Login;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function loginView(){

        return view('login');

    }
    public function signUp(){

        return view('signup');

    }

    public function store(Request $request)
    {
        $request->validate(

            [
                    'user_name' =>'required',
                    // 'user_password' =>'required|confirmed',
                    // 'confirm_password' =>'required',
                    'user_password' => 'min:6|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'min:6',
                    'phone_number' =>'required',
                    'user_image' => 'required'


            ]


            );

            try {


                $user_image = $request->file('user_image');
                if (isset($user_image)) {
                    $user_image_name = $user_image->getClientOriginalName();
                    $user_image_name = str_replace(" ", "_", time().$user_image_name);
                    $user_image_path = 'upload/image/';
                   $user_image->move($user_image_path, $user_image_name);

                }
                else{
                    return back()->withError('no image found');
                }
        $user = new Login();
        $user->user_name = $request->user_name;
        $user->user_password = $request->user_password;
        $user->phone_number = $request->phone_number;
        $user->user_image_name = $user_image_name;
        $user->user_image_path = $user_image_path;
        $user->created_at  = Carbon::now('PKT');
        $user->updated_at  = Carbon::now('PKT');
        $user->save();

        return redirect()->route('user.login');
    }

    catch(Exception $ex){
        return back()->withError($ex->getMessage())->withInput();

    }

    }

    public function userlogin(Request $request)
{
    $request->validate([
        'user_name'=>'required',
        'user_password'=>'required',
    ]);

    try{
            $user = Login::where('user_name',$request->user_name)->first();

        if ($user) {
            if(Login::where('user_password',$request->user_password)->first()){
                    // session()->put('user_id',$user->user_id);

                    session([
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                         'image' =>$user->user_image_path.$user->user_image_name,
                        ]);



                return redirect()->route('role.add');
            }else{
                return back()->withError('Invalid Username/Password');

            }

        } else {
            return back()->withError('Invalid Username/Password');
        }

}  catch(Exception $ex){
    return back()->withError($ex->getMessage())->withInput();

}
}

public function logout()
{
    Session::flush();
    return redirect()->route('user.login');
}


}
