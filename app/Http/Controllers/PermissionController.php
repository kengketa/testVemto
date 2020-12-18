<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;

class PermissionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Permission::class);

        $search = $request->get('search', '');

        $permissions = Permission::search($search)
            ->latest()
            ->paginate();

        return view('app.permissions.index', compact('permissions', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Permission::class);

        $roles = Role::pluck('name', 'id');

        return view('app.permissions.create', compact('roles'));
    }

    /**
     * @param \App\Http\Requests\PermissionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        $this->authorize('create', Permission::class);

        $validated = $request->validated();

        $permission = Permission::create($validated);

        return redirect()
            ->route('permissions.edit', $permission)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Permission $permission)
    {
        $this->authorize('view', $permission);

        return view('app.permissions.show', compact('permission'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $roles = Role::pluck('name', 'id');

        return view('app.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * @param \App\Http\Requests\PermissionUpdateRequest $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(
        PermissionUpdateRequest $request,
        Permission $permission
    ) {
        $this->authorize('update', $permission);

        $validated = $request->validated();

        $permission->update($validated);

        return redirect()
            ->route('permissions.edit', $permission)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
        $this->authorize('delete', $permission);

        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
