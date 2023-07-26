@extends('backend.dashboard')
@section('dashboardcontent')
<main>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <h6>Leave</h6>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+Apply Leave</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apply Leave</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('employee.leave.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label for="">Leave Type</label>
                            </div>
                            <div class="col-10"><select name="leave_type" class="form-control" id="">
                                    <option value="-">-</option>
                                    <option value="casual">Casual</option>
                                    <option value="maternity">Maternity</option>
                                    <option value="paternity">Paternity</option>
                                    <option value="sick">Sick</option>
                                </select></div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-2"><label>Duration </label></div>
                            <div class="col-10">
                                <input type="radio" name="radioGroup" onclick="toggleInputFields(1)"> Single Day
                                <input type="radio" name="radioGroup" onclick="toggleInputFields(2)">Multiple Day
                            </div>
                            <div class="row">
                                <div id="inputField1" style="margin-top: 15px;" class="input-field">
                                    <div class="row">
                                        <div class="col-2">Date</div>
                                        <div class="col-10">
                                            <input type="date" placeholder="Start Date" class="form-control" name="start_date">
                                        </div>
                                    </div>
                                </div>

                                <div id="inputField2" style="margin-top: 15px;" class="input-field">
                                    <div class="row">
                                        <div class="col-2">End Date</div>
                                        <div class="col-10">
                                            <input type="date" placeholder="End Date" class="form-control" name="end_date">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-2"><label for="Reason"></label>Reason</div>
                                <div class="col-10">
                                    <textarea name="reason" class="form-control" placeholder="Reason"></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Assign Leave</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</main>


@endsection
<script>
    function toggleInputFields(selectedRadio) {
        const inputField1 = document.getElementById('inputField1');
        const inputField2 = document.getElementById('inputField2');

        if (selectedRadio === 1) {
            inputField1.style.display = 'block';
            inputField2.style.display = 'none';
        } else if (selectedRadio === 2) {
            inputField1.style.display = 'block';
            inputField2.style.display = 'block';
        }
    }
</script>
</script>
</body>

</html>