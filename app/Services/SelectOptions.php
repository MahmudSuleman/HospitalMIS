<?php


namespace App\Services;


use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Gender;
use App\Models\Medicine;
use App\Models\Role;
use App\Models\User;


class SelectOptions
{

    public static function UserRoles(int $selectedIndex=0): string
    {
        $roles = Role::all();
        $options = "<option value=''>PLEASE SELECT</option>";
        foreach ($roles as $role){
            $selected = $selectedIndex == $role->id ? 'selected': '';
            $options .= "<option " .$selected." value='".$role->id ."'>". $role->name ."</option>";
        }
        return $options;
    }

    /**
     * department select options
     * pass selected index to select a default value
     * @param int $selectedIndex
     * @return string
     *
     */
    public static function Departments(int $selectedIndex = 0){
        $departments = Department::all();
        $options = "<option value=''>PLEASE SELECT</option>";
        foreach ($departments as $dept){
            $selected = $dept->id == $selectedIndex ? 'selected' : '';
            $options .= "<option value='{$dept->id}' {$selected}>{$dept->name}</option>";
        }
        return $options;

    }


    public static function EmployeesType(int $selectedIndex = 0){
        $employees = EmployeeType::all();
        $options = "<option value=''>PLEASE SELECT</option>";
        foreach ($employees as $employee){
            $selected = $employee->id == $selectedIndex ? 'selected' : '';
            $options .= "<option value='{$employee->id}' {$selected}>{$employee->name}</option>";
        }
        return $options;

    }


    public static function Gender($selectedIndex = 0): string
    {
        $genders = Gender::all();
        $options = "<option value=''>PLEASE SELECT</option>";
        foreach ($genders as $gender){
            $selected = $gender->id == $selectedIndex ? 'selected' : '';
            $options .= "<option value='{$gender->id}' {$selected}>{$gender->name}</option>";
        }
        return $options;

    }

    public static function doctors(int $selectedIndex = 0): string
    {
        $doctors = User::where('role_id', 2)->get();
        $options = "<option value=''>PLEASE SELECT</option>";
        foreach ($doctors as $doctor){
            $selected = $doctor->id == $selectedIndex ? 'selected' : '';
            $options .= "<option $selected  value='{$doctor->id}'>{$doctor->name}</option>";
        }
        return $options;
    }

    public static function medicines(int $selectedIndex = 0): string
    {
        $medicines = Medicine::all();
        $options = "<option value='' >PLEASE SELECT</option>";
        foreach ($medicines as $medicine){
            $selected = $medicine->id == $selectedIndex ? 'selected' : '';
            $options  .= "<option {$selected} value='{$medicine->id}' >{$medicine->name}</option>";
        }
        return $options;
    }

}
