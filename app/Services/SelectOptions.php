<?php


namespace App\Services;


use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Role;

/**
 * This class stores all the methods to generate various select options
 * @package App\Services
 */
class SelectOptions
{
    /**
     * user roles select options
     * pass selected index to select a default value
     * @param int $selectedIndex
     * @return string
     */
    public static function UserRoles($selectedIndex=0){
        $roles = Role::all();
        $options = "<option value=''>Please Select</option>";
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
    public static function Departments($selectedIndex = 0){
        $departments = Department::all();
        $options = "<option value=''>Please Select</option>";
        foreach ($departments as $dept){
            $selected = $dept->id == $selectedIndex ? 'selected' : '';
            $options .= "<option value='{$dept->id}' {$selected}>{$dept->name}</option>";
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
    public static function EmployeesType($selectedIndex = 0){
        $employees = EmployeeType::all();
        $options = "<option value=''>Please Select</option>";
        foreach ($employees as $employee){
            $selected = $employee->id == $selectedIndex ? 'selected' : '';
            $options .= "<option value='{$employee->id}' {$selected}>{$employee->name}</option>";
        }
        return $options;

    }

}
