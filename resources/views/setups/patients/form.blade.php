<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="firstName">FirstName </label>
            <input type="text"
                   class="form-control @error('firstName') is-invalid @enderror"
                   id="firstName"
                   name="firstName">
            @error('firstName')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="lastName">LastName</label>
            <input type="text"
                   class="form-control @error('lastName') is-invalid @enderror"
                   id="lastName"
                   name="lastName">
            @error('lastName')
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
            <label for="gender">Gender</label>
            <select
                   class="form-control @error('gender') is-invalid @enderror"
                   id="gender"
                   name="gender">
                <?= \App\Services\SelectOptions::Gender() ?>
            </select>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="department_id">Department</label>
            <select
                   class="form-control @error('department_id') is-invalid @enderror"
                   id="department_id"
                   name="department_id">
                <?= \App\Services\SelectOptions::Departments() ?>
            </select>
            @error('department_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="user_id">Doctor</label>
            <select
                   class="form-control @error('user_id') is-invalid @enderror"
                   id="user_id"
                   name="user_id">
            </select>
            @error('user_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        </div>
    </div>

</div>

