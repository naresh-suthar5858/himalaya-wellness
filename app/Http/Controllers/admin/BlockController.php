<?php

namespace App\Http\Controllers\admin;

use App\Models\Block;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DataTables;
use Gate;


class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('block_index') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        if ($request->ajax()) {
            // Fetch roles
            $data = Block::all();  
            // Fetch all roles
        
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
                                        <a class="dropdown-item" href="'. route("block.edit", $row->id) .'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="'. route('block.destroy', $row->id) .'" method="post">
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
                 ->addColumn('image', function($row){

                     $image = $row->getFirstMediaUrl('image');

                     if ($image) {
                         return "<img src='$image' alt='User Image' style='max-width: 100px; max-height: 100px;'>";
                     } else {
                         return 'No user image';
                     }

                 })
                 ->addColumn('description', function($row){

                    return $row->description;

                })
                ->addColumn('status', function($row){

                    return $row->status==1?'Enable':'Disable';

                })
                ->rawColumns(['action','image','description'])  // Ensure the HTML is rendered for the action column
                ->make(true);
        }  
        return view('admin.block.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('block_create') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('admin.block.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('block_store') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image', // Optional image validation
            'ordering' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
        ]);

        $heading = $request->heading;
        $identifier = strtolower(str_replace(' ', '-', $heading));

        // dd($request->all());

        $blockData = [
            'identifier'=>$identifier,
            'title'=>$request->title,
            'heading'=>$heading,
            'description'=>$request->description,
            'ordering'=>$request->ordering,
            'status'=>$request->status,

        ];

        // dd($blockData);

        $block = Block::create($blockData);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $block->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()->route('block.index')->with('success','Block Created Successfully');
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
        // abort_if(Gate::denies('block_edit') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $block = Block::findOrFail($id);
        return view('admin.block.edit',compact('block'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // abort_if(Gate::denies('block_update') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $block = Block::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image', // Optional image validation
            'ordering' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
        ]);
        $heading = $request->heading;
        $identifier = strtolower(str_replace(' ', '-', $heading));
        $upData = [
            'title'=>$request->title,
            'heading'=>$heading,
            'description'=>$request->description,
            'ordering'=>$request->ordering,
            'status'=>$request->status,
            'identifier'=>$identifier,

        ];
        $block->update($upData);

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $block->clearMediaCollection('image');
            $block->addMediaFromRequest('image')->toMediaCollection('image');
        }

        return redirect()->route('block.index')->with('success','Block Updated Successfully');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // abort_if(Gate::denies('block_destroy') , Response::HTTP_FORBIDDEN,'403 Forbidden');

        $id = Block::findOrFail($id);

        $id->delete();

        return redirect()->route('block.index')->with('success','Block Deleted Successfully');;

    }
}
