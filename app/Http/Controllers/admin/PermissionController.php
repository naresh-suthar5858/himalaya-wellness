<?php

namespace App\Http\Controllers\admin;


use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Gate;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('permission_index') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        if ($request->ajax()) {
            // Fetch roles
            $data = Permission::select('*');  // Fetch all roles
        
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
                                        <a class="dropdown-item" href="'. route("permission.edit", $row->id) .'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="'. route('permission.destroy', $row->id) .'" method="post">
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
                ->rawColumns(['action'])  // Ensure the HTML is rendered for the action column
                ->make(true);
        }  
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('permission_create') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('permission_store') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        // dd($request->all());

        // dd($permssions);
        foreach ($request->name as $key => $permission) {
            $request->validate([
                'name' => 'required'
            ]);

            $permissionData = [
                'name' => $permission,
            ];

            $permission = Permission::create($permissionData);
        }
        return redirect()->route('permission.index');
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
        // abort_if(Gate::denies('permission_edit') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $permission = Permission::findOrFail($id);
       
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // abort_if(Gate::denies('permission_update') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $id = Permission::findOrFail($id);

        $id->update(['name'=>$request->name]);

        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // abort_if(Gate::denies('permission_destroy') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $id = Permission::findOrFail($id);
        $id->delete();

        return redirect()->route('permission.index');
    }
}
