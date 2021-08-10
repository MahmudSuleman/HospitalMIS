@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="card-title pull-left">
                        <h3>Patient's Recent Diagnoses History</h3>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col">
                    @include('flash-message')
                </div>
            </div>
            <div class="row">

                @foreach($patient->diagnose as $diagnoses)
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="symptoms">Symptoms</label>
                            <textarea disabled name="symptoms" id="symptoms" cols="30" rows="2"
                                      class="form-control">{{$diagnoses->symptoms}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="observations">observations</label>
                            <textarea disabled name="observations" id="observations" cols="30" rows="2"
                                      class="form-control">{{$diagnoses->observations}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <table class="table table-responsive table-striped " width="100%">
                            <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Dosage</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($diagnoses->prescription as $prescription)
                                <tr>
                                    <td>{{$prescription->medicine->name}}</td>
                                    <td> {{$prescription->dosage}}</td>
                                    <td>
                                        <form method="post" id="delete-prescription" action="{{route('prescription.destroy', [$prescription])}}">
                                            @csrf()
                                            <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <form id="delete-diagnose" action="{{route('diagnose.destroy', [$diagnoses])}}" method="post">
                            @csrf
                            <button class="btn btn-danger"  type="submit">Delete Diagnoses</button>
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        $(document).on('submit', '#delete-diagnose', function(data){
            return confirm('are you sure you want to delete this?');
        });

        $(document).on('submit', '#delete-prescription', function(data){
            return confirm('are you sure you want to delete this?');
        });
    </script>

@endsection
