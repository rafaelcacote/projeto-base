<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(15);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $validated = $request->validated();
        $validated['guard_name'] = $validated['guard_name'] ?? 'web';
        
        Permission::create($validated);
        return redirect()->route('permissions.index')->with('success', 'Permissão criada com sucesso!');
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $validated = $request->validated();
        $validated['guard_name'] = $validated['guard_name'] ?? 'web';
        
        $permission->update($validated);
        return redirect()->route('permissions.index')->with('success', 'Permissão atualizada com sucesso!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permissão removida com sucesso!');
    }
}
