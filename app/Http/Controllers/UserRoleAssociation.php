<?php

namespace App\Http\Controllers;

use App\Models\RoleExtended;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserRoleAssociation extends Controller
{
    final public function index(): View
    {
        $page_content = [
            'page_title'      => __('User Role Association'),
            'module_name'     => __('User Role'),
            'sub_module_name' => __('Association'),
            'module_route'    => route('role.index')
        ];
        $users        = (new User())->getAllUsers();
        return view('user_role_association.index', compact('page_content', 'users'));
    }

    /**
     * @param User $user
     * @return View
     */
    final public function assign_role_to_user(User $user): View
    {
        $page_content = [
            'page_title'      => __('Assign Role to User'),
            'module_name'     => __('User Role'),
            'sub_module_name' => __('Assign Role'),
            'module_route'    => route('role.index')
        ];
        $user->load('roles');
        $user_assigned_role_id_list = $user->roles()->pluck('id')->toArray();
        $roles                      = (new RoleExtended())->getAllRole();
        return view('user_role_association.assign_role_to_user', compact('page_content', 'user', 'roles', 'user_assigned_role_id_list'));
    }

    /**
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    final public function assign_role_to_user_sync(User $user, Request $request):RedirectResponse
    {
        if ($request->has('role_id')){
            $role_id = $request->input('role_id');
            $user->roles()->sync($role_id);
        }
        return redirect()->route('user.role_association');
    }
}
