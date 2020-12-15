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

                        <form action="{{(route('user.store'))}}" method="post" enctype="multipart/form-data">

                            @csrf

                            @if (session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            <div class="form-group">
                                <label>Role :</label>
                                <select name="role_id" class="form-control select2">
                                    <option value=""> ---- select Role ------ </option>
                                    @foreach ($role as $item)
                                    <option value="{{$item->role_id}}" @if (old('role_id') == $item->role_id) selected
                                        @endif>{{$item->role_type}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('role_id'))
                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <label for=""> User Name:</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Enter Type"
                                    value="{{old('user_name')}}">
                                @if ($errors->has('user_name'))
                                <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <label for=""> User Passowrd:</label>
                                <input type="password" name="user_password" class="form-control"
                                    placeholder="Enter Type" value="{{old('user_password')}}">
                                @if ($errors->has('user_password'))
                                <span class="text-danger">{{ $errors->first('user_password') }}</span>
                                @endif
                            </div>



                            <div class="form-group">
                                <label> User gender :</label>
                                <select name="user_gender" class="form-control select2">
                                    <option value="male">Male  </option>
                                    <option value="female"> Female  </option>



                                </select>

                                 @if ($errors->has('user_gender'))
                                <span class="text-danger">{{ $errors->first('user_gender') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Student Image :</label>

                                <input type="file" name="user_image" class="form-control">

                                @if ($errors->has('user_image'))
                                <span class="text-danger">{{ $errors->first('user_image') }}</span>
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
