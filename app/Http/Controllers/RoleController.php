<?php

namespace App\Http\Controllers;

use App\Models\RoleExtended;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    final public function index(): View
    {
        $page_content = [
            'page_title'      => __('Role List'),
            'module_name'     => __('Role'),
            'sub_module_name' => __('List'),
            'module_route'    => route('role.create'),
            'button_type'    => 'create' //list
        ];
        $roles        = (new RoleExtended())->getAllRole();
        return view('role.index', compact('page_content', 'roles'));
    }

    final public function create(): View
    {
        $page_content = [
            'page_title'      => __('Role Create'),
            'module_name'     => __('Role'),
            'sub_module_name' => __('Create'),
            'module_route'    => route('role.index'),
            'button_type'    => 'list' //list
        ];

        return view('role.create', compact('page_content'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    final public function store(Request $request): RedirectResponse
    {
        (new RoleExtended())->storeRole($request);
        session()->flash('message', 'Role created successfully');
        session()->flash('class', 'success');
        return redirect()->route('role.index');
    }


    /**
     * @param Role $role
     * @return View
     */
    final public function edit(Role $role): View
    {
        $page_content = [
            'page_title'      => __('Role Edit'),
            'module_name'     => __('Role'),
            'sub_module_name' => __('Edit'),
            'module_route'    => route('role.index'),
            'button_type'    => 'list' //list
        ];


        return view('role.edit', compact('page_content', 'role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    final public function update(Request $request, Role $role): RedirectResponse
    {
        (new RoleExtended())->updateRole($role, $request);
        session()->flash('message', 'Role updated successfully');
        session()->flash('class', 'success');
        return redirect()->route('role.index');
    }

    final public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        session()->flash('message', 'Role deleted successfully');
        session()->flash('class', 'danger');
        return redirect()->route('role.index');
    }
}
