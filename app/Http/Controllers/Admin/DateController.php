<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use App\Models\Date;

class DateController extends Controller
{
    public function create()
    {
        return view('date');
    }


    public function store(Request $request)
    {
        try{

            $date = new Date();
            $date->date_stored = $request->date_stored;
            $date->created_at  = Carbon::now('PKT');
            $date->updated_at  = Carbon::now('PKT');
            $date->save();

            //return redirect()->route('date');
            return back()->with('date_stored',$date->date_stored);

        }

        catch(Exception $ex){
            return back()->withError($ex->getMessage())->withInput();

        }
    }

    public function edit($user_id)
    {
        $date = Date::where('user_id',$user_id)->first();
        return view("edit")->with('date',$date);
    }
}
