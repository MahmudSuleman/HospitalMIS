<?php
$current_checkin =   $checkin->diagnose->first();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('syntra/assets/css/bootstrap.min.css')}}">
    <title>Consultation Receipt</title>
    <style>
        .receipt-body {
            border: 1px solid black;
            width: 700px;
            border-radius: 10px;
            margin: auto;
            padding: 20px;

        }
    </style>
</head>
<body>
<div class="receipt-body">
    <h1 class="text-center underline text-monospace">Tyler Bright Hospital</h1>
    <h2 class="text-center underline">Consultation Receipt</h2>
    <div class="row">
        <div class="col"><h5>To: {{$checkin->patient->first_name .' '. $checkin->patient->last_name}}</h5></div>
        <div class="col"></div>
        <div class="col"><h5>Date: {{date('d-m-Y')}}</h5></div>
    </div>
    <div class="row">
        <div class="col"><p><b>Doctor:</b> {{$checkin->user->name}}</p></div>
    </div>
    <div class="row">
        <div class="col"><p><b>Checked In:</b> {{ $checkin->created_at->format('d-m-Y')}}</p></div>
    </div>
    <div class="row">
        <div class="col"><p><b>Consultation Fee(GHS):</b> 500</p></div>
    </div>

    <div class="row">
        <table class="table">
            <tr>
                <th>Symptoms</th>
                <td>{{$current_checkin->symptoms}}</td>
            </tr>
            <tr>
                <th>Observations</th>
                              <td>{{$current_checkin->observations}}</td>
            </tr>
        </table>
        <table class="table table-striped my-5">
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
            </tr>

            @foreach($current_checkin->prescription as $prescription)
                <tr>
                    <td>{{$prescription->medicine->name}}</td>
                    <td>{{$prescription->dosage}}</td>
                </tr>
            @endforeach
        </table>
    </div>


</div>

<script>
    print();
</script>
</body>
</html>

