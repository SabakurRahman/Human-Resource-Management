<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container-fl">
    <br>
    <br>
    <p>Date: {{ $date }}</p>
    <p>To,</p>
    <p>The Branch Manager,</p>
    <p>Dhaka Bank Ltd., Banasree Branch,</p>
    <p>Subject: Request for Salary Account Transfer Letter.</p>

    <p>Dear Sir,</p>
    <p>Please be good enough to Debit {{ $totalAmount}} ({{$covertToWord}} Taka Only) for salary of  {{ $endDate->format('F') }} - {{ $endDate->year }} from our Current Deposit Account (SME) A/C Name:{{$companyName}}, A/C No. {{$account}} and Credit the following monies to the respective Account, as detailed below.</p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Account Name</th>
            <th>Account No.</th>
            <th>Total (Taka)</th>
        </tr>
        </thead>
        <tbody>
        <!-- Loop through your payroll data here -->
        @foreach ($payrollData as $employee)
            <tr>
                <td>{{ $employee['account_holder_name'] }}</td>
                <td>{{ $employee['account_number'] }}</td>
                <td>{{ $employee['total_gross'] }}</td>
            </tr>
        @endforeach
        <tr>
            <td>Total</td>
            <td></td>
            <td>{{ $totalAmount }}</td>
        </tr>
        </tbody>
    </table>



    <p>Please do the needful. Thank you for your time and consideration.</p>

    <br>
    <br>
    <hr width="10">
    <br>

    <p>Yours sincerely,</p>
    <p>{{ $ceoName }}</p>
    <p>CEO Of {{ $companyName }}</p>
    <p>{{ $companyAddress }}</p>
</div>
</body>
</html>
