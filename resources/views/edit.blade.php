@extends('dashboard')

@section('content')



<section class="content">

    <div class="row">

        <div class="col-md-8">

            <div class="box box-primary">
                <div class="box-header text-center" style="margin-top:10px;">

                    <h1 class="box-title text-center">Add Employee</h1>

                </div>

                <div class="box-body">

                    <div class="col-md-6 col-md-offset-3">

                        <form action="" method="post">

                            @csrf
                            <div class="form-group">

                                <label for=""> Date Store :</label>
                                <input type="date" name="date_stored" class="form-control" placeholder="Enter Type"
                                    value="{{old('date_stored',$date->date_stored)}}">

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
