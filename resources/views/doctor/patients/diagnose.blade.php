@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h3 class="text-center">Diagnose Patient</h3>
                </div>
            </div>

            {{--            <form action="{{route('doctor.diagnose_add', [$patient])}}" method="post">--}}
            <form action="{{route('doctor.diagnose_add', [$patient])}}" id="diagnoseForm" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <label for="symptoms">Symptoms</label>
                            <textarea id="symptoms" name="symptoms" class="form-control" rows="3"></textarea>
                            <span class='text-danger symptoms-error is-invalid d-none'> <strong> This field is required</strong></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <label for="observations">Observations</label>
                            <textarea id="observations" name="observations" class="form-control" rows="3"></textarea>
                            <span class='text-danger observations-error is-invalid d-none'> <strong> This field is required</strong></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <h3>Prescriptions</h3>
                    </div>
                </div>
                <div class="row" id="wrapper">

                    <div class="col-sm-6 offset-sm-3">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">

                                    <select class="form-control medicine" name="medicine[]" id="medicine">
                                        <?= \App\Services\SelectOptions::medicines()  ?>
                                    </select>
                                    <span class='text-danger medicine-error d-none'> <strong> This field is required</strong></span>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control dosage" type="text" name="dosage[]" id="dosage">
                                    <span class='text-danger dosage-error d-none'> <strong> This field is required</strong></span>
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">

                                    <button type="button" id="add-prec" class="btn btn-success"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script>

        let child = `
        <div class="col-sm-6 offset-sm-3 child-div">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">

                                    <select class="form-control medicine" name="medicine[]" id="medicine">`
            +  "<?= \App\Services\SelectOptions::medicines()  ?>"+
                                    `</select>
                                    <span class='text-danger medicine-error d-none'> <strong> This field is required</strong></span>

                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control dosage" type="text" name="dosage[]" id="dosage">
                                    <span class='text-danger dosage-error d-none'> <strong> This field is required</strong></span>
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">

                                    <button type="button" class="btn btn-danger btn-remove-prec"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                        </div>


                    </div>`
        $(document).ready(function () {
            $(document).on('click', '#add-prec', function () {
                $('#wrapper').append(child)
            })

            $(document).on('click', '.btn-remove-prec', function () {
                $(this).closest('.child-div').remove()
            })

            /// submit form
            $(document).on('submit', '#diagnoseForm', function () {
                // get dosage input elements and error dives
                let dosages_elements = $('.dosage');
                let dosage_error = $('.dosage-error');
                let errors_count = 0;
                let dosage_values = [];

                //for each dosage element, perform validation
                for (let i = 0; i < dosages_elements.length; i++) {
                    let e = $(dosages_elements[i])
                    dosage_values.push(e.val());

                    if (e.val() === '') {
                        errors_count++;
                        e.addClass('is-invalid')
                        $(dosage_error[i]).removeClass('d-none')
                    } else {
                        e.removeClass('is-invalid')
                        $(dosage_error[i]).addClass('d-none')

                    }
                }

                //get medicine select elements and error divs
                let medicine_elements = $('.medicine');
                let medicine_error = $('.medicine-error');
                let medicine_values = []

                //for each medicine element, make validation
                for(let i= 0; i< medicine_elements.length; i++){
                    let e = $(medicine_elements[i]);
                    medicine_values.push(e.val());

                    //if the value is empty
                    if(e.val() === ''){
                        errors_count++;
                        e.addClass('is-invalid');
                        $(medicine_error[i]).removeClass('d-none');
                    }else{
                        e.removeClass('is-invalid');
                        $(medicine_error[i]).addClass('d-none');
                    }
                }


                //symptoms data
                let symptoms_element = $('#symptoms');
                let symptoms_value = symptoms_element.val();

                if(symptoms_value === ''){
                    errors_count++;
                    $('.symptoms-error').removeClass('d-none');
                }else{
                    $('.symptoms-error').addClass('d-none');
                }

                //observations data
                let observations_element = $('#observations');
                let observations_value = observations_element.val();

                if(observations_value === ''){
                    errors_count++;
                    $('.observations-error').removeClass('d-none');
                }else{
                    $('.observations-error').addClass('d-none');
                }






                // make a form data inputs
                 let data ={
                    _token: "<?= csrf_token() ?>",
                    medicine : medicine_values,
                    dosage : dosage_values,
                     observations : observations_value,
                     symptoms: symptoms_value,

                 };

                //no errors in forms
                if(errors_count === 0){
                    $.post("{{route('doctor.diagnose_add', [$patient])}}", data, function(d){
                        console.log(d)
                        try{
                            // let msg = JSON.parse(d);
                            let success = d['success'];
                            console.log(typeof success)
                            if(success){
                                swal(
                                    {
                                        title: 'Success!',
                                        text: 'Data Saved!',
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3'
                                    }
                                ).then(function(e){
                                    if(e['value']){
                                        location.href = "{{route('doctor.patient')}}"
                                    }
                                });

                            }else{
                                swal(
                                    {
                                        title: 'Error!',
                                        text: 'Data Not Saved!',
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3'
                                    }
                                )
                            }

                        }catch (e) {
                            console.log(e)
                            swal(
                                {
                                    title: 'Error!',
                                    text: 'Data Not Saved!',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                }
                            )
                        }
                    });

                }
                return false;
            })


        })
    </script>
@endsection
