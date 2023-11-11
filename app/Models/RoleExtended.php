<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleExtended extends Role
{
    use HasFactory;


    public const ROLE_TYPE_SUPER_ADMIN = 1;

    public const ROLE_TYPE_HR = 2;
    public const ROLE_EMPLOYEE = 3;

    public const ROLE_TYPE_LIST =
        [
            self::ROLE_TYPE_SUPER_ADMIN   => 'Super Admin',
            self::ROLE_TYPE_HR => 'Hr',
            self::ROLE_EMPLOYEE => 'Employee',
        ];
    public function getAllRole()
    {
     return self::query()->orderByDesc('id')->get();

    }

    public function storeRole(Request $request)
    {
        return self::query()->create($request->all());
    }

    public function updateRole(Role $role, Request $request)
    {
        return $role->update($request->all());
    }
}
