<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

function is_super_admin(): bool
{
    if (request()?->route()?->uri != 'login') {
        $super_admin = User::query()->whereHas('roles', static function ($query) {
            $query->where('name', 'like', '%super admin%');
        })->find(Auth::user()?->id);

        if ($super_admin) {
            return true;
        }
        return false;
    }
    return true;
}
