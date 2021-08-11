@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">Active Checked In Patients</div>
            @include('flash-message')
        <div class="card-body">

            <table id="checkins" class="table table-striped responsive">
                <thead>
                <tr>
                    <th>Card No.</th>
                    <th>Full Name</th>
                    <th>Doctor</th>
                    <th>Check In Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($checkIns as $checkin)
                    @if($checkin->is_checked_out == 0)
                    <tr>
                        <td>{{$checkin->patient->patient_id}}</td>
                        <td>{{$checkin->patient->first_name .' '. $checkin->patient->last_name}}</td>
                        <td>{{$checkin->user->name}}</td>
                        <td>{{$checkin->created_at}}</td>
                        <td><a class="btn btn-danger" href="{{route('patient.checkout', [$checkin])}}"> <i class="fa fa-trash"></i> Check Out</a></td>

                    </tr>
                    @endif
                @endforeach
                </tbody>



            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $('#checkins').dataTable({});

        });
    </script>
@endsection
