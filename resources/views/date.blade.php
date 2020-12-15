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

                        <form action="{{route('date.store')}}" method="post">
                            @csrf

                            @if (session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                            @endif


                                <div class="form-group">

                                <label for=""> Date Store: </label>
                                <input type="date" name="date_stored" class="form-control"
                                    placeholder="Enter Type"  value="{{old('date_stored')}}">
                                @if ($errors->has('date_stored'))
                                <span class="text-danger">{{ $errors->first('date_stored') }}</span>
                                @endif
                            </div>


                            <div class="box-footer text-center">
                                {{-- <button type="submit" class="btn btn-success">Submit</button> --}}

                                <button  type="submit" class="btn btn-success">Submit</button>
                            {{-- <a href="{{route('date.edit',$date->user_id)}}" type="submit" class="btn btn-success">GO</a> --}}
                            </div>




                        </form>

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>

@endsection
