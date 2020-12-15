@extends('dashboard')

@section('content')

<section class="content">



    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header">

                    <h2 class="box-title">Student Data Entry</h2>
                </div>

                <div class="box-body">

                    <div class="col-md-6 col-md-offset-3">

                        <form action="{{route('manager.update',$manager->manager_id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Role :</label>
                                <select name="role_id" class="form-control select2">
                                    <option value=""> ---- select Role ------ </option>
                                    @foreach ($role as $item)
                                    @if ($item->role_id == $manager->role_id)
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
                                <label> Manager Name :</label>

                                <input type="text" name="manager_name" placeholder="Enter Name"
                                    value="{{old('manager_name',$manager->manager_name)}}" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> Manager Designation :</label>

                                <input type="text" name="manager_designation" placeholder="Enter Name"
                                    value="{{old('manager_designation',$manager->manager_designation)}}"
                                    class="form-control">

                            </div>
                            <div class="form-group">
                                <label> Passowrd :</label>

                                <input type="password" name="manager_password" placeholder="Enter password"
                                    value="{{old('manager_password',$manager->manager_password)}}" class="form-control">

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




</section>
@endsection
