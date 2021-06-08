<div class="row">
    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="first_name">FirstName</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{$employee->first_name ?? old('first_name')}}">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="last_name">LastName</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{$employee->last_name ?? old('last_name')}}">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="department_id">Department</label>
            <select type="text" class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                <?= \App\Services\SelectOptions::Departments($employee->department_id ?? old('department_id')) ?>
            </select>
            @error('department_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="employee_type_id">Employee Type</label>
            <select type="text" class="form-control @error('employee_type_id') is-invalid @enderror" id="employee_type_id" name="employee_type_id">
                <?= \App\Services\SelectOptions::EmployeesType($employee->employee_type_id ?? old('employee_type_id')) ?>
            </select>
            @error('employee_type_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{$employee->date_of_birth ?? old('date_of_birth')}}">
            @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div  class="col-sm-6 offset-sm-3">
        <div class="form-group">
            <button class="btn btn-primary btn-block">Submit</button>
        </div>
    </div>
</div>
