@extends('backend.dashboard')
@section('dashboardcontent')
<main>
   
    <div class="card">
        <div class="card-body" style="padding: 20px;">
        <a href="{{route('create')}}" style="float: right; border-color:blue" class="btn btn-white">+ Add New Employee</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Leave Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->image}}</td>
                        <td> <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View Details</a></td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <center>
                        <h1 class="modal-title fs-5" style="margin-top: 2%;" id="exampleModalLabel">Leave Details</h1>
                    </center>
                <div class="modal-body">
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection