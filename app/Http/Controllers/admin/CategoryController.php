<?php

namespace App\Http\Controllers\admin;

use Gate;
use Response;
use DataTables;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Category::all();

            return DataTables()::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                // Action buttons for each role (Edit, Delete, Show)
                $btn = '<div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="'. route("category.edit", $row->id) .'">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="'. route('category.destroy', $row->id) .'" method="post">
                                    '. csrf_field() .'
                                    '. method_field("DELETE") .'
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                </li>
                               <li>
                                        <a class="dropdown-item" href="'. route("category.show", $row->id) .'">
                                            <i class="fa fa-eye"></i> show
                                        </a>
                                    </li>
                            </ul>
                        </div>';
                return $btn;
            })
            ->addColumn('image' , function($row){
                $img =  $row->getFirstMediaUrl('image');
                return "<img src='$img' alt='category Image' style='max-width: 100px; max-height: 100px;'>";
            })
            ->rawColumns(['action','image'])  // Ensure the HTML is rendered for the action column
            ->make(true);
        }
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::where('status',1)->get();
        return view('admin.category.create',compact('categories','products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'parent_category'=>'nullable',
            'show_in_menu'=>'required|in:1,2',
            'status'=>'required|in:1,0',
            'meta_tag'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'short_description'=>'required',
            'description'=>'required',
        ]);

        $urlkey = strtolower(str_replace(' ','-',$request->name));
// dd($urlkey);
        $categoryData = 
        [
           'name' => $request->name ,
            'parent_category'=> $request->parent_category,
            'show_in_menu'=> $request->show_in_menu,
            'status'=> $request->status,
            'meta_tag'=>$request->meta_tag ,
            'meta_title'=>$request->meta_title ,
            'meta_description'=> $request->meta_description,
            'short_description'=>$request->short_description ,
            'description'=> $request->description,
            'url_key'=> $urlkey
        ];

        $category = Category::create($categoryData);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->addMediaFromRequest('image')->toMediaCollection('image');
        }
        $category->products()->sync($request->products??[]);
        return redirect()->route('category.index');
        // dd($categoryData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $products = Product::where('status',1)->get();

        return view('admin.category.edit',compact('category','categories','products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'parent_category'=>'nullable',
            'show_in_menu'=>'required|in:1,2',
            'status'=>'required|in:1,0',
            'meta_tag'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'short_description'=>'required',
            'description'=>'required',
        ]);

        $urlkey = strtolower(str_replace(' ','-',$request->name));
// dd($urlkey);
        $upData = 
        [
           'name' => $request->name ,
            'parent_category'=> $request->parent_category,
            'show_in_menu'=> $request->show_in_menu,
            'status'=> $request->status,
            'meta_tag'=>$request->meta_tag ,
            'meta_title'=>$request->meta_title ,
            'meta_description'=> $request->meta_description,
            'short_description'=>$request->short_description ,
            'description'=> $request->description,
            'url_key'=> $urlkey
        ];

        $category->update($upData);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->clearMediaCollection('image');
            $category->addMediaFromRequest('image')->toMediaCollection('image');
        }
        $category->products()->sync($request->products??[]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('category.index');

    }
}
