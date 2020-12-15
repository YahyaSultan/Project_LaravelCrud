@extends('dashboard')

@section('content')



<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header text-center" style="margin-top:10px;">

                    <h1 class="box-title text-center">Add Role</h1>

                </div>

                <div class="box-body">

                    <div class="col-md-6 col-md-offset-3">

                        <form action="{{route('manager.store')}}" method="post">

                            @csrf

                            @if (session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            <div class="form-group">
                                <label>Role :</label>
                                <select name="role_id" class="form-control select2">
                                    <option value=""> ---- select Role ------ </option>
                                    @foreach ($role as $item)
                                    <option value="{{$item->role_id}}" @if (old('role_id')==$item->role_id) selected
                                        @endif>{{$item->role_type}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('role_id'))
                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <label for=""> Manager Name:</label>
                                <input type="text" name="manager_name" class="form-control" placeholder="Enter Type"
                                    value="{{old('manager_name')}}">
                                @if ($errors->has('manager_name'))
                                <span class="text-danger">{{ $errors->first('manager_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <label for=""> Manager Deignation:</label>
                                <input type="text" name="manager_designation" class="form-control"
                                    placeholder="Enter Type" value="{{old('manager_designation')}}">
                                @if ($errors->has('manager_designation'))
                                <span class="text-danger">{{ $errors->first('manager_designation') }}</span>
                                @endif
                            </div>



                            <div class="form-group">
                                <label> Passowrd :</label>

                                <input type="password" name="manager_password" placeholder="Enter Name"
                                    value="{{old('manager_passowrd')}}" class="form-control">

                                @if ($errors->has('manager_password'))
                                <span class="text-danger">{{ $errors->first('manager_password') }}</span>
                                @endif

                            </div>



                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>


                        </form>

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>

@endsection
