<?php

namespace App\Http\Controllers\admin;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('user_index') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        if ($request->ajax()) {
            
            $data = User::all(); // Fetches all user instances
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    // getFirstMediaUrl called on the model instance
                    $image = $row->getFirstMediaUrl('image'); 
    
                    if ($image) {
                        return "<img src='$image' alt='User Image' style='max-width: 100px; max-height: 100px;'>";
                    } else {
                        return 'No user image';
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="'. route("user.edit", $row->id) .'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="'. route('user.destroy', $row->id) .'" method="post">
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
                ->addColumn('role' , function($row)
                {
                    $roles = $row->roles()->pluck('name')->toArray();

                    return implode('<br>',$roles);
                })
                ->addColumn('gender' , function($row)
                { 
                    return $row->gender == 'm'?'Male':'Female';
                })
                ->addColumn('is_admin' , function($row)
                {
                    
                    return $row->is_admin == 0?'No':'Yes';
                })
                ->rawColumns(['image', 'action','role'])
                ->make(true);
        }
    
        return \view('admin.user.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('user_create') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }


    public function profile()
    {
        // abort_if(Gate::denies('user_profile') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        // $roles = Role::all();
        return view('admin.user.profile');
    }


    public function changePassword(Request $request)
    {
        // abort_if(Gate::denies('user_changePassword') , Response::HTTP_FORBIDDEN,'403 Forbidden');

    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required',
        'confirm_password'=> 'required|same:new_password'
    ]);

    $user = Auth::user();
    // Check if current password matches with the logged-in user's password
    if (!Hash::check($request->current_password, $user->password)) {

        return back()->with('error', 'Current password does not match!');
    }
    else
    {
    
        $updatePass = [ 
            'password'=>Hash::make($request->new_password)
        ];

        $user->update($updatePass);

        return redirect()->route('logOut');


    }

   
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('user_store') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        // dd($request->all());
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'gender' => 'required',
                'phone' => 'required',
                'is_admin' => 'required',
                'password' => 'required',
                'password_conform' => 'required|same:password',
            ],
            [
                'name.required' => 'Enter the username',
                'email.required' => 'Enter the email',
                'email.email' => 'Enter the valid email',
                'password.required' => 'Enter the password',

            ]
        );
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'is_admin' => $request->is_admin,

        ];
// dd();
        $user = User::create($userData);

        $user->syncRoles($request->role);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('user.index');
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
        // abort_if(Gate::denies('user_edit') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $roles = Role::all();

        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // abort_if(Gate::denies('user_update') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $id = User::findOrFail($id);

        $updata = [
            'name'=>$request->name,
            'email'=>$request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'is_admin' => $request->is_admin,
        ];
        $id->update($updata);
        $id->syncRoles($request->role);

         if($request->hasFile('image') && $request->file('image')->isValid())
         {
            $id->clearMediaCollection('image');
            $id->addMediaFromRequest('image')->toMediaCollection('image');
         }
         return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // abort_if(Gate::denies('user_destroy') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $id = User::findOrFail($id);
        $id->delete();

        return redirect()->route('user.index');
    }
}
