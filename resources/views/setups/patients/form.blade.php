<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="first_name">FirstName </label>
            <input type="text"
                   value="{{$patient->first_name ?? old('first_name')}}"
                   class="form-control @error('first_name') is-invalid @enderror"
                   id="first_name"
                   name="first_name">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="last_name">LastName</label>
            <input type="text"
                   value="{{$patient->last_name ?? old('last_name')}}"

                   class="form-control @error('last_name') is-invalid @enderror"
                   id="last_name"
                   name="last_name">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="date_of_birth">Data Of Birth</label>
            <input type="date"
                   value="{{$patient->date_of_birth ?? old('date_of_birth')}}"

                   class="form-control @error('date_of_birth') is-invalid @enderror"
                   id="date_of_birth"
                   name="date_of_birth">
            @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="gender_id">Gender</label>
            <select
                class="form-control @error('gender_id') is-invalid @enderror"
                id="gender_id"
                name="gender_id">
                <?= \App\Services\SelectOptions::Gender($patient->gender_id ?? old('gender_id')) ?>
            </select>
            @error('gender_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>
</div>

