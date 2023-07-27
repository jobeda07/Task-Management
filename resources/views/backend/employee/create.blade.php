@extends('backend.dashboard')
@section('dashboardcontent')
<main>

    <div class="card" style="padding:5%">
        <div class="card-body">

            <form action="{{route('create.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" required name="name">
                    </div>
                    <div class="col-6">
                        <label for="">Employee Id</label>
                        <input type="text" class="form-control" name="employee_id">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">email</label>
                        <input type="email" class="form-control" required name="email">
                    </div>
                    <div class="col-6">
                        <label for="">phone</label>
                        <input type="text" class="form-control" required name="phone">
                    </div>
                </div>
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <center> <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                </center>
            </form>

        </div>
    </div>
    @endsection