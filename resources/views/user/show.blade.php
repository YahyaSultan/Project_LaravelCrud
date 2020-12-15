@extends('dashboard')

@section('content')

<section class="content">

    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3>Search Users</h3>
                </div>
                <div class="box-body">

                <form action="{{route('user.show')}}" method="GET">



                        <div class="form-group row">

                            <div class="col-md-4 col-md-offset-2">
                            <label for=""> Search</label>
                            <input type="text" name="search" class="form-control" placeholder=" Search"
                                value="{{old('search')}}">
                            </div>

                            <div class="col-md-4">
                                <label for=""> Role</label>
                                <input type="text" name="role" class="form-control" placeholder=" role"
                                    value="{{old('role')}}">
                                </div>


                        </div>



                        <div class="box-footer text-center">

                            <button class="btn btn-primary "> Search</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>




    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header text-center" style="margin-top: 10px">
                    <h1 class="box-title text-bold">Employee Portal</h1>
                </div>

                <div class="box-body">




                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Role type</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">User Password</th>
                                <th class="text-center">User Gender</th>
                                <th class="">Student Image</th>


                                <th class=""> Actions</th>



                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($user as $item)

                            <tr>
                                <td class="text-center">{{$item->role_type}}</td>
                                <td class="text-center">{{$item->user_name}}</td>
                                <td class="text-center">{{$item->user_password}}</td>
                                <td class="text-center">{{$item->user_gender}}</td>
                                <td class="text-center">
                                    @if ($item->user_image_name == null)
                                    ------
                                    @else
                                    <img style="width: 100px; height:100px"
                                        src="{{ URL::asset($item->user_image_path.$item->user_image_name)}}"
                                        alt="user profile image" class="img-responsive">
                                    @endif

                                </td>


                                <td>

                                    <a class="btn btn-primary text-center" href="{{Route('user.edit',$item->user_id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" href="" data-toggle="modal"
                                        data-target="#{{$item->user_id}}">
                                        <i class="fa fa-trash"></i></a>




                                </td>



                            </tr>


                            <!-- Modal -->
                            <div class="modal fade" id="{{$item->user_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <b>Are you sure you want to delete?</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">No</button>
                                            <a href="{{Route('user.delete',$item->user_id)}}" type="button"
                                                class="btn btn-primary">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            @endforeach

                        </tbody>



                    </table>




                    {{ $user->links() }}
                </div>
            </div>


        </div>
    </div>
    </div>

</section>

@endsection
