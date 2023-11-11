@extends('frontend.layouts.master')
@section('content')
    @include('payroll.partials.search')
    <div class="table-responsive">
        <h3 class="text-center mb-5">Month: {{ $endDate->format('F') }} {{ $endDate->year }}</h3>

        <a type="button" href="{{ route('payroll.index', [
                'start_date' => \Carbon\Carbon::parse($startDate)->format('Y-m-d') ?? '',
                'end_date' =>\Carbon\Carbon::parse($endDate)->format('Y-m-d')  ?? '',
                'export' => 'csv'
            ]) }}" class="action-button btn btn-sm btn-warning mb-2">Print Payroll Csv</a>

        <a type="button" href="{{ route('payroll.index', [
                'start_date' => \Carbon\Carbon::parse($startDate)->format('Y-m-d') ?? '',
                'end_date' =>\Carbon\Carbon::parse($endDate)->format('Y-m-d')  ?? '',
                'export' => 'pdf'
            ]) }}" class="action-button btn btn-sm btn-success mb-2">Account Transfer Later</a>
{{--        <a type="button" href="{{ route('pay-slip') }}" class="action-button btn btn-sm btn-success mb-2">Print PaymentSlip</a>    <a type="button" href="{{ route('pay-slip') }}" class="action-button btn btn-sm btn-success mb-2">Print PaymentSlip</a>--}}
        <a type="button" href="{{ route('payroll.index', [
                'start_date' => \Carbon\Carbon::parse($startDate)->format('Y-m-d') ?? '',
                'end_date' =>\Carbon\Carbon::parse($endDate)->format('Y-m-d')  ?? '',
                'export' => 'salary-statement-pdf'
            ]) }}" class="action-button btn btn-sm btn-secondary mb-2">Salary Statement</a>

        <a type="button" href="{{ route('payroll.index', [
                'start_date' => \Carbon\Carbon::parse($startDate)->format('Y-m-d') ?? '',
                'end_date' =>\Carbon\Carbon::parse($endDate)->format('Y-m-d')  ?? '',
                'export' => 'employee-payslip-pdf'
            ]) }}" class="action-button btn btn-sm btn-danger mb-2">Pay Slip</a>

        <button type="button" data-type="print" class="action-button btn btn-sm btn-info mb-2">Print
        </button>


        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" class="from-control" id="select_all_check">
                </th>
                <th>SL</th>
                <th>Employee Id-Name</th>
                <th>Joining Date</th>
                <th>Designation</th>
                <th>Gross Total</th>
                <th>Basic-Medical-House</th>
                <th>Working Day</th>
                {{--                            <th>Employee Present-employee Absent</th>--}}
                <th>Late Coming</th>
                <th>Leave Approve</th>
                <th>Present-Absent</th>
                <th>Deduction</th>
                <th>Payable Salary</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($payrollData as $employee)
                <tr>

                    <td>
                        <input type="checkbox" class="from-control checkbox-items" data-id="{{$employee->id}}">

                    </td>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$employee?->employee_id}}-{{$employee?->user?->name}}</td>
                    <td>{{$employee?->joining_date}}</td>
                    <td>{{$employee?->designation}}
                        -{{ App\Models\Employee::JOB_TYPE_LIST[$employee?->job_type] ??null}}</td>
                    <td>{{$employee?->gross_total}}</td>
                    <td><p>basic:{{$employee?->basic_total}}</p>
                        <p>medical:{{$employee?->medical}}</p>
                        <p>house:{{$employee?->house_rent}}</p></td>
                    <td>{{$payrollData->working_day}}</td>
                    <td>{{$employee?->delay}}</td>
                    <td>{{$employee?->leave_count}}</td>
                    <td><p>present:{{$employee?->net_present}}</p>
                        <p>absent:{{$employee->net_absent}} </p></td>
                    <td>{{  $employee->deducted_salary}}</td>
                    <td>{{$employee?->total_gross}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-end"><span id="totalPayableSum">Total Payable Sum: 0</span></div>
    </div>

    <div class="d-flex justify-content-end mt-3">

    </div>

    <div class="d-none">
        {!! Form::open(['route'=>'payslip.print', 'method'=>'put', 'id'=>'payslip.print']) !!}
        <input type="text" name="payslip_ids" id="payslip_ids">
        <input type="text" name="type" id="type">
        <input type="text" name="value" id="value">
        {!! Form::close() !!}
    </div>


@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"
        integrity="sha512-aoTNnqZcT8B4AmeCFmiSnDlc4Nj/KPaZyB5G7JnOnUEkdNpCZs1LCankiYi01sLTyWy+m2P+W4XM+BuQ3Q4/Dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        let payslip_ids = [];


        $('.checkbox-items').on('click', function () {
            let data_id = $(this).data('id');
            if ($(this).prop('checked')) {
                payslip_ids.push(data_id); // Add the ID to the array
            } else {
                let index = payslip_ids.indexOf(data_id);
                if (index !== -1) {
                    payslip_ids.splice(index, 1); // Remove the ID from the array
                }
            }
        });

        $('#select_all_check').on('click', function () {
            let is_checked = $(this).prop('checked')
            let checkbox_element = $('.checkbox-items')
            checkbox_element.prop('checked', is_checked)
            checkbox_element.each(function (item, index) {
                if (is_checked) {
                    payslip_ids.push($(this).attr('data-id'))
                } else {
                    payslip_ids = []
                }
            })
        })

        $('.action-button').on('click', function () {
            let action = $(this).attr('data-type');
            if (action == 'print') {
                $('#payslip_ids').val(payslip_ids.join(',')); // Update the hidden input field with a comma-separated list
                $('#type').val(action);

                let data = {
                    type: action,
                    payslip_ids: payslip_ids
                };

                console.log(data['payslip_ids']);

                //
                axios.put('{{route('payslip.print')}}', data).then(res => {
                    let winPrint = window.open("", "print_invoice", "width=0,height=0");
                    winPrint.document.write(res.data);
                }).catch(err => {
                    console.log(err)
                })


            }
        });
    });

</script>

<script>
    $(document).ready(function () {
        $('#toggleDashboard').click(function () {
            $('.dashboard-boxes').slideToggle();
        });
    });
</script>

@endpush



