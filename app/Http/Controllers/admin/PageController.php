<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('page_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            // Fetch roles
            $data = Page::all();
            // Fetch all roles

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Action buttons for each role (Edit, Delete, Show)
                    $btn = '<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="' . route("page.edit", $row->id) . '">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="' . route('page.destroy', $row->id) . '" method="post">
                                        ' . csrf_field() . '
                                        ' . method_field("DELETE") . '
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    </li>

                                </ul>
                            </div>';
                    return $btn;
                })
                ->addColumn('image', function ($row) {

                    $image = $row->getFirstMediaUrl('image');

                    if ($image) {
                        return "<img src='$image' alt='User Image' style='max-width: 100px; max-height: 100px;'>";
                    } else {
                        return 'No user image';
                    }

                })
                ->addColumn('description', function ($row) {

                    return $row->description;

                })
                ->addColumn('status', function ($row) {

                    return $row->status == 1 ? 'Enable' : 'Disable';

                })
                ->rawColumns(['action', 'image', 'description']) // Ensure the HTML is rendered for the action column
                ->make(true);
        }
        return view('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('page_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');
// dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image', // Optional image validation
            'ordering' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
            'show_in_menu' => 'required|in:1,2',
            'show_in_footer' => 'required|in:1,2',
        ]);

        $heading = $request->heading;
        $url_key = strtolower(str_replace(' ', '-', $heading));

        $pageData = [
            'title' => $request->title,
            'heading' => $heading,
            'description' => $request->description,
            'ordering' => $request->ordering,
            'url_key' => $url_key,
            'status' => $request->status,
            'meta_tag' => $request->meta_tag,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'show_in_menu' => $request->show_in_menu,
            'show_in_footer' => $request->show_in_footer,

        ];

        // dd($pageData);

        $page = Page::create($pageData);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $page->addMediaFromRequest('image')->toMediaCollection('image');
        } else {
            return view('admin.page.create');

        }

        return redirect()->route('page.index');
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
        // abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page = Page::findOrFail($id);

        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // abort_if(Gate::denies('page_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image', // Optional image validation
            'ordering' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
            'show_in_menu' => 'required|in:1,2',
            'show_in_footer' => 'required|in:1,2',
        ]);

        $heading = $request->heading;
        $url_key = strtolower(str_replace(' ', '-', $heading));

        $upData = [
            'title' => $request->title,
            'heading' => $heading,
            'description' => $request->description,
            'ordering' => $request->ordering,
            'url_key' => $url_key,
            'status' => $request->status,
            'meta_tag' => $request->meta_tag,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'show_in_menu' => $request->show_in_menu,
            'show_in_footer' => $request->show_in_footer,

        ];

        $page->update($upData);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $page->clearMediaCollection('image');
            $page->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('page.index');
// dd($upData);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // abort_if(Gate::denies('page_destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page = Page::findOrFail($id);

        $page->delete();
        return redirect()->route('page.index');

    }
}
