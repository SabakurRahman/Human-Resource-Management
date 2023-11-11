@extends('frontend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="clear" data-bs-toggle="tab" href="#home" role="tab">Self
                        Attendance</a>
                </li>

                @role('Hr')
                <li class="nav-item">
                    <a class="nav-link" id="clear2" data-bs-toggle="tab" href="#profile" role="tab">Others
                        Attendance</a>
                </li>
                @endrole

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Employee Id</th>
                                            <th>name</th>
                                            <th>Designation</th>
                                            <th>Date</th>
                                            <th>Attending Time</th>
                                            <th>Leave Time</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>{{$employee?->employee_id}}</td>
                                            <td>{{$employee?->user?->name}}</td>
                                            <td>{{$employee?->designation}}</td>
                                            <td>{{ now()->toDateString() }}</td>
                                            <form action="{{route('store.attendance')}}" method="POST">
                                                @csrf
                                                <td>
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="time" class="form-control" name="in_time" id="in_time" value="{{ now()->format('H:i:s') }}" readonly>
                                                        <button class="btn btn-sm btn-theme" type="button" id="currentTimeButtonIn">
                                                            <i class="ri-time-line"></i>
                                                        </button>
                                                    </div>

                                                <td>
                                                    <div style="display: flex; align-items: center;">
                                                        <input type="time" class="form-control" name="out_time"
                                                               id="out_time" value="{{now()->format('H:i:s')}}" readonly>
                                                        <button class="btn btn-sm btn-theme" type="button"
                                                                id="currentTimeButtonOut">
                                                            <i class="ri-time-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="note" id="note">
                                                </td>

                                                <td>
                                                    <button class="btn btn-sm btn-theme" type="submit">
                                                        <i class="ri-save-3-fill" style="font-size: 20px; color: #FF5733;"></i>
                                                    </button>

                                                </td>

                                            </form>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Employee Id</th>
                                            <th>name</th>
                                            <th>Designation</th>
                                            <th>Date</th>
                                            <th>Attending Time</th>
                                            <th>Leave Time</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($employees as $employeesData)
                                           <tr>
                                               <td>{{$loop->iteration}}</td>
                                               <td>{{$employeesData?->employee_id}}</td>
                                               <td>{{$employeesData?->user?->name}}</td>
                                               <td>{{$employeesData?->designation}}</td>
                                               <td>{{ now()->toDateString() }}</td>
                                               <form action="{{route('mark.another.attendance',['id' => $employeesData->id])}}" method="POST">
                                                   @csrf

                                                   <td width="180px">

                                                       <input type="time" class="form-control" name="in_time"
                                                              id="in_time_27"  />
                                                   </td>
                                                   <td width="180px">
                                                       <input type="time" class="form-control" name="out_time"
                                                              id="out_time_27"
                                                              onclick="calculateOutTime(27)">
                                                   </td>
                                                   <td>
                                                       <input type="text" class="form-control" name="note" id="note"
                                                              value="">
                                                   </td>
                                                   <td>
                                                       <button class="btn btn-sm btn-theme" type="submit">
                                                           <i class="ri-save-3-fill" style="font-size: 20px; color: #FF5733;"></i>
                                                       </button>

                                                   </td>

                                               </form>
                                           </tr>
                                       @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
            document.getElementById("currentTimeButtonIn").addEventListener("click", function() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var currentTime = hours + ":" + minutes;

            document.getElementById("in_time").value = currentTime;
        });

            document.getElementById("currentTimeButtonOut").addEventListener("click", function() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var currentTime = hours + ":" + minutes;

            document.getElementById("out_time").value = currentTime;
        });


            $('#department').select2().on('change', function() {
            var department_id = $(this).val();
            if (department_id) {
            $.ajax({
            url: "https://deshify-admin.microhost.one/admin/department-employee",
            type: "GET",
            data: {
            department_id: department_id
        },
            success: function(data) {
            console.log(data);
            $('#employee').empty();
            $('#employee').append(
            '<option value="">Select Employee</option>');
            $.each(data.data, function(key, value) {
            $('#employee').append('<option value="' + value.id +
            '">' + value.name + '</option>');
        });
        }
        });
        } else {
            $('#employee').empty();
            $('#employee').append('<option value="">Select Employee</option>');
        }
        });

            $('#employee').select2();

            function calculateInTime(id){
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var currentTime = hours + ":" + minutes;

            document.getElementById("in_time_"+id).value = currentTime;
        }

            function calculateOutTime(id){
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var currentTime = hours + ":" + minutes;

            document.getElementById("out_time_"+id).value = currentTime;
        }

    </script>




@endsection
