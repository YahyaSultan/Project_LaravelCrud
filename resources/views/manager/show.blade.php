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

                <form action="{{route('manager.show')}}" method="GET">



                        <div class="form-group row">

                            <div class="col-md-4 col-md-offset-2">
                            <label for=""> Search</label>
                            <input type="text" name="search_manager" class="form-control" placeholder=" Search Name"
                                value="{{old('search_manager')}}">
                            </div>

                            <div class="col-md-4">
                                <label for=""> Role</label>
                                <input type="text" name="role_manager" class="form-control" placeholder=" Search Role "
                                    value="{{old('role_manager')}}">
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

        <div class="col-md-12">

            <div class="box box-primary">

                <div class="box-header">

                    <h1 class="box-title">

                    </h1>
                </div>

                <div class="box-body">

                    <table class="table table-light">
                        <thead class="thead thead-light">
                            <tr>
                                <th class="text-center">Role Type</th>
                                <th class="text-center">Manager Name</th>
                                <th class="text-center">Manager designation</th>
                                <th class="text-center">Manager password</th>
                                <th class=""> Actions</th>


                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($manager as $item)

                            <tr>
                                <td class="text-center">{{$item->role_type}}</td>
                                <td class="text-center">{{$item->manager_name}}</td>
                                <td class="text-center">{{$item->manager_designation}}</td>
                                <td class="text-center">{{$item->manager_password}}</td>
                                <td>

                                    <a class="btn btn-primary text-center"
                                        href="{{Route('manager.edit',$item->manager_id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" href="" data-toggle="modal"
                                        data-target="#{{$item->manager_id}}">
                                        <i class="fa fa-trash"></i></a>




                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="{{$item->manager_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Manager</h5>
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
                                            <a href="{{Route('manager.delete',$item->manager_id)}}" type="button"
                                                class="btn btn-primary">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div @endforeach
                         </tbody>
                         </table>
                         {{ $manager->links() }} </div> </div> </div> </div> </section> @endsection
