<?php


namespace App\Services;


use App\Models\Role;

class SelectOptions
{
    public static function UserRoles($selectedIndex=0){
        $roles = Role::all();
        $options = "<option value=''>Please Select</option>";
        foreach ($roles as $role){
            $selected = $selectedIndex == $role->id ? 'selected': '';
            $options .= "<option " .$selected." value='".$role->id ."'>". $role->name ."</option>";
        }
        return $options;
    }

}
