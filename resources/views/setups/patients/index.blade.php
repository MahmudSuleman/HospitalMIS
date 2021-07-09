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
                <div class="col">
                    <a href="{{route('patient.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Add Patient</a>

                </div>


            </div>
            <hr>
            <div class="row">
                <div class="col">
                    @include('flash-message')
                </div>
            </div>

            <table class="table table-striped responsive" width="100%" id="tbl_user">
                <thead>
                <tr>
                    <th>Card No.</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Gender</th>
                    <th>D.O.B</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{$patient->patient_id}}</td>
                        <td>{{$patient->first_name}}</td>
                        <td>{{$patient->last_name}}</td>
                        <td>{{$patient->gender->name}}</td>
                        <td>{{$patient->date_of_birth}}</td>
                        <td>
                            @if(count($patient->checkIn()->where('is_checked_out', 0 )->get()) == 0)
                            <button class="btn btn-success btnAssign" id="{{$patient->id}}" ><i class="fa fa-send"></i> Check In</button>
                            @endif
                                <a class="btn btn-warning" href="{{route('patient.edit', [$patient])}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{--modal--}}
    <div class="modal fade" id="modalAssign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Doctor To Assign A Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="assignForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="doctor_id">Doctor</label>
                            <select required name="doctor_id" id="doctor_id" class="form-control">
                                <?= \App\Services\SelectOptions::doctors() ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Assign Patient</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{--modal--}}
@endsection
@section('scripts')
    <script>
        let user_table = $('#tbl_user').DataTable({
            responsive: true,
            'columnDefs': [{
                'targets': [-1],
                'orderable': false
            }]
        })

        let patient_id;

        $(document).on('click', '.btnAssign', function(event){
           $('#modalAssign').modal('show');
            patient_id = event.target.id;
        });

        $('#assignForm').on('submit', function (event) {

            let user_id = $('#doctor_id').val()
            let _token = $('input[name="_token"]').val()

            $.ajax({
                type: "POST",
                url: "{{route('patient.checkin')}}", // This is what I have updated
                data: {
                    _token,
                    user_id,
                    patient_id,

                }
            }).done(function( msg ) {
                $('#modalAssign').modal('hide');
                $('#assignForm').trigger('reset')
                let data = JSON.parse(msg);
                if(data['success']){
                    swal(
                        {
                            title: 'Good job!',
                            text: 'Patient Assigned Successfully!',
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        }
                    ).then(function (data) {
                        location.href = ''
                    })
                }else{
                    swal('Oops...', data['message'], 'error')
                }
            });

            return false;
        })
    </script>
@endsection
