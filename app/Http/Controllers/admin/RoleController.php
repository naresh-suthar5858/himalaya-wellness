<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('role_index') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        if ($request->ajax()) {
            // Fetch roles
            $data = Role::select('*');  // Fetch all roles
        
            return DataTables::of($data)
                ->addIndexColumn()            
                ->addColumn('action', function($row){
                    // Action buttons for each role (Edit, Delete, Show)
                    $btn = '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="'. route("role.edit", $row->id) .'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="'. route('role.destroy', $row->id) .'" method="post">
                                        '. csrf_field() .'
                                        '. method_field("DELETE") .'
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    </li>
                                   
                                </ul>
                            </div>';
                    return $btn;
                })
                ->addColumn('permission' , function($row)
                {
                    $permissions = $row->permissions()->pluck('name')->toArray();

                    return implode('<br>',$permissions);
                })
                ->rawColumns(['action','permission'])  // Ensure the HTML is rendered for the action column
                ->make(true);
        }  
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('role_create') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('role_store') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            'name'=>'required'
        ]);

        // dd($request->all());

        $roleData = [
            'name' => $request->name
        ];

        $role = Role::create($roleData);

        $role->syncPermissions($request->permission);

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // abort_if(Gate::denies('role_edit') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // abort_if(Gate::denies('role_update') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            'name'=>'required'
        ]);
        $role = Role::findOrFail($id);

        $role->update([
            'name'=>$request->name
        ]);

        $role->syncPermissions($request->permission);

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
