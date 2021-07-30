@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title pull-left">
                        <h3>Patients List</h3>
                    </div>
                </div>
            </div>
            <hr>

            <table class="table table-striped" id="tbl_user">
                <thead>
                <tr>
                    <th>Card No.</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients  as $patient)
                    <tr>
                        <td>{{ $patient->patient->patient_id}}</td>
                        <td>{{$patient->patient->first_name}}</td>
                        <td>{{$patient->patient->last_name}}</td>
                        <td>
                            @if($patient->diagnose->first() !== null)
                                <a class="btn btn-warning" href="#"><i
                                        class="fa fa-edit"></i> Review Diagnoses</a>
                            @else
                                <a class="btn btn-success" href="{{route('doctor.diagnose',  [$patient])}}"><i
                                        class="fa fa-edit"></i> Diagnose</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
@section('scripts')
    <script>
        var user_table = $('#tbl_user').DataTable({
            responsive: true,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        })
    </script>
@endsection
