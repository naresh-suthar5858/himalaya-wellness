<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{  
    // abort_if(Gate::denies('slider_index') , Response::HTTP_FORBIDDEN,'403 Forbidden');

    if ($request->ajax()) {
    // Get User model instances instead of using select('*')
    $data = Slider::all(); // Fetches all user instances
    // dd($data);
    return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('image', function ($row) {
            // getFirstMediaUrl called on the model instance
            $image = $row->getFirstMediaUrl('image'); // Collection name 'image'

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
                                        <a class="dropdown-item" href="'. route("slider.edit", $row->id) .'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="'. route('slider.destroy', $row->id) .'" method="post">
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
        ->addColumn('status', function($row){

            return $row->status==1?'Enable':'Disable';

        })
        ->rawColumns(['image', 'action'])
        ->make(true);
}


        return \view('admin.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('slider_create') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('slider_store') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            "title" => 'required',
            "ordering" => 'required',
            "status" => 'required',
        ]);

        $sliderData = [
            'title'=>$request->title,
            'ordering'=>$request->ordering,
            'status'=>$request->status,
        ];


        $slider = Slider::create($sliderData);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $slider->addMediaFromRequest('image')->toMediaCollection('image');

        }

        return redirect()->route('slider.index');
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
        // abort_if(Gate::denies('slider_edit') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // abort_if(Gate::denies('slider_update') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $slider = Slider::findOrFail($id);

        $UpData = [
            'title'=> $request->title,
            'ordering'=> $request->ordering,
            'status'=> $request->status,
        ];

        $slider->update($UpData);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $slider->clearMediaCollection('image');
            $slider->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        return redirect()->route('slider.index');

    }
}
