@extends('backend.dashboard')
@section('dashboardcontent')
<main>

    <div class="card">
        <div class="card-body" style="padding: 20px;">
            <a href="{{route('create')}}" style="float: right; border-color:blue" class="btn btn-white">+ Add New Employee</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $key=>$data)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td> <img width="50px" height="50px" src="{{ asset('uploads/employee/' . $data->image) }}" alt="img not added"></td>
                        <td> <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$data->id}}"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="if(confirm('Are You sure?')){ location.replace('{{route('employee.delete',$data->id)}}') }"> <i class="bi bi-trash-fill"></i></button>
                            
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">View Leave Details</a>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <center>
                                            <h1 class="modal-title fs-5" style="margin-top: 2%;" id="exampleModalLabel">Leave Details</h1>
                                        </center>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Month</th>
                                                        <th>Days</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>January</td>
                                                    </tr>
                                                    <tr>
                                                        <td>February</td>
                                                    </tr>
                                                    <tr>
                                                        <td>March</td>
                                                    </tr>
                                                    <tr>
                                                        <td>April</td>
                                                    </tr>
                                                    <tr>
                                                        <td>May</td>
                                                    </tr>
                                                    <tr>
                                                        <td>June</td>
                                                    </tr>
                                                    <tr>
                                                        <td>July</td>
                                                    </tr>
                                                    <tr>
                                                        <td>August</td>
                                                    </tr>
                                                    <tr>
                                                        <td>September</td>
                                                    </tr>
                                                    <tr>
                                                        <td>October</td>
                                                    </tr>
                                                    <tr>
                                                        <td>November</td>
                                                    </tr>
                                                    <tr>
                                                        <td>December</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal1{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <center>
                                            <h1 class="modal-title fs-5" style="margin-top: 2%;" id="exampleModalLabel">Edit Employee</h1>
                                        </center>
                                        <div class="modal-body">
                                            <form action="{{route('create.edit.post',$data->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="">Name</label>
                                                        <input type="text" value="{{$data->name}}" class="form-control" name="name">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="">Employee Id</label>
                                                        <input type="text" value="{{$data->Employee_id}}" class="form-control" name="employee_id">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="">email</label>
                                                        <input type="email" value="{{$data->email}}" class="form-control" name="email">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="">phone</label>
                                                        <input type="text" value="{{$data->phone}}" class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <label for="">Image</label>
                                                <input type="file" value="{{$data->image}}" class="form-control" name="image">
                                                <img src="{{ asset('uploads/employee/' . $data->image??'d/no-img.jpg')}}" alt="" width="50" class="rounded-circle">

                                                <center> <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




    </div>


    </div>
</main>


@endsection