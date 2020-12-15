@extends('dashboard')

@section('content')

<section class="content">



    <div class="row">

        <div class="col-md-8">

            <div class="box box-primary">
                <div class="box-header">

                    <h2 class="box-title">Student Data Entry</h2>
                </div>

                <div class="box-body">

                    <div class="col-md-6 col-md-offset-3">

                        <form action="{{route('user.update',$user->user_id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Role :</label>
                                <select name="role_id" class="form-control select2">
                                    <option value=""> ---- select Role ------ </option>
                                    @foreach ($role as $item)
                                    @if ($item->role_id == $user->role_id)
                                    <option value="{{$item->role_id}}" selected>{{$item->role_type}}</option>
                                    @else
                                    <option value="{{$item->role_id}}">{{$item->role_type}}</option>
                                    @endif

                                    @endforeach

                                </select>
                                @if ($errors->has('role_id'))
                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label> User Name :</label>

                                <input type="text" name="user_name" placeholder="Enter Name"
                                    value="{{old('user_name',$user->user_name)}}" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> User Passowrd :</label>

                                <input type="password" name="user_password" placeholder="Enter password"
                                    value="{{old('user_password',$user->user_password)}}" class="form-control">

                            </div>

                            <div class="form-group">
                                <label> User Gender :</label>

                                <input type="text" name="user_gender" placeholder="Enter Name"
                                    value="{{old('user_gender',$user->user_gender)}}" class="form-control">

                            </div>


                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">

                                    Submit
                                </button>

                            </div>
                        </form>


                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="box box-primary">

                <div class="box-header">
                    <h2 class="box-title"> Edit Image</h2>
                </div>

                <div class="box-body">



                    <div class="form-group">

                        <img style="width: 100%; height:300px"
                            src="{{ URL::asset($user->user_image_path.$user->user_image_name)}}"
                            alt="user profile image" class="img-responsive">


                    </div>

                    <div class="box-footer text-center">
                        <button type="Submit" class="btn btn-primary" data-toggle="modal"
                            data-target="#{{$user->user_id}}">

                            Update
                        </button>

                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="{{$user->user_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('userimage.update',$user->user_id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <label> User Image :</label>

                                        <input type="file" name="user_image" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>



</section>
@endsection
