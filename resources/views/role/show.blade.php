@extends('dashboard')

@section('content')

<section class="content">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header text-center" style="margin-top: 10px">
                    <h1 class="box-title text-bold">Employee Portal</h1>
                </div>

                <div class="box-body">

                    <div class="col-md-6 col-md-offset-3">
                        <form action="#" method="post">
                            @if ($role->count() > 0)
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">Role type</th>

                                        <th class=""> Actions</th>



                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($role as $item)

                                    <tr>
                                        <td class="text-center">{{$item->role_type}}</td>


                                        <td>

                                            <a class="btn btn-primary text-center"
                                                href="{{Route('role.edit',$item->role_id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a class="btn btn-danger" href="" data-toggle="modal"
                                                data-target="#{{$item->role_id}}">
                                                <i class="fa fa-trash"></i></a>

                                        </td>



                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$item->role_id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <b>Are you sure you want to delete?</b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <a href="{{Route('role.delete',$item->role_id)}}" type="button"
                                                        class="btn btn-primary">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach

                                </tbody>
                                @else

                                <h3 class="text-center">Not Found...</h3>
                                @endif
                            </table>


                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>

</section>

@endsection
