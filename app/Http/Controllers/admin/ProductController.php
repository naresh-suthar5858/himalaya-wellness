<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('product_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            // Fetch roles
            $data = Product::all();
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
                                        <a class="dropdown-item" href="' . route("product.edit", $row->id) . '">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="' . route('product.destroy', $row->id) . '" method="post">
                                        ' . csrf_field() . '
                                        ' . method_field("DELETE") . '
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="' . route("product.show", $row->id) . '">
                                            <i class="fa fa-eye"></i> show
                                        </a>
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

                ->addColumn('status', function ($row) {

                    return $row->status == 1 ? 'Enable' : 'Disable';

                })
                ->addColumn('stock_status', function ($row) {

                    if ($row->stock_status == 1) {
                        return 'Out of Stock';
                    } elseif ($row->stock_status == 3) {
                        return 'In Stock';
                    } elseif ($row->stock_status == 2) {
                        return 'Few in Stock';
                    } else {
                        return 'Unknown'; // You can add a default case if none of the conditions match
                    }
                })
                ->rawColumns(['action', 'image']) // Ensure the HTML is rendered for the action column
                ->make(true);
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $attributes = Attribute::where('status', 1)->get();  2`+
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('admin.products.create', compact('products','categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('product_store'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'is_featured' => 'required|in:2,1',
            'weight' => 'nullable|numeric',
            'price' => 'required|numeric|min:0',
            'special_price' => 'nullable|numeric|min:0|lt:price',
            'special_price_from' => 'nullable|date',
            'special_price_to' => 'nullable|date|after_or_equal:special_price_from',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'related_product' => 'nullable|array|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'thumb_image' => 'required|image|max:2048',
            'banner_images.*' => 'nullable|image|max:2048',
        ]);

        $name = $request->name;
        $url_key = strtolower(preg_replace('/[^a-zA-Z\s]/', '', $name));
        $url_key = str_replace(' ', '-', $url_key);

        $related_product = "";
        if ($request->related_product) {
            $related_product = implode(',', $request->related_product);
        }


        $productData = [
            "name" => $name,
            "status" => $request->status,
            "is_featured" => $request->is_featured,
            "weight" => $request->weight,
            "price" => $request->price,
            "special_price" => $request->special_price,
            "special_price_from" => $request->special_price_from,
            "special_price_to" => $request->special_price_to,
            "description" => $request->description,
            "related_product" => $related_product,
            "meta_tag" => $request->meta_tag,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
            "url_key" => $url_key,
            "short_description" => $request->short_description,
        ];
// dd($productData);
        $product = Product::create($productData);

        if ($request->hasfile('banner_images')) {
            foreach ($request->file('banner_images') as $image) {
                $product->addMedia($image)->toMediaCollection('banner_images');
            }
        }

        if ($request->hasFile('thumb_image') && $request->file('thumb_image')->isValid()) {
            $product->addMediaFromRequest('thumb_image')->toMediaCollection('image');
        }

        $product->categories()->sync($request->category ?? []);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::with('categories')->findOrFail($id);

        $relatedIds = explode(',', $product->related_product);

        $relatedProducts = Product::whereIn('id', $relatedIds)->get();

        // Pass both the product and its related products to the view
        return view('admin.product.show', compact('product', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $products = Product::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        // $attributes = Attribute::where('status', 1)->get();

        $product = Product::with('categories')->findOrFail($id);

        return view('admin.products.edit', compact('product', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // abort_if(Gate::denies('product_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($request->all());
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2',
            'is_featured' => 'required|in:1,2',
            'qty' => 'required|integer|min:1',
            // 'stock_status' => 'required|in:1,2,3',
            'weight' => 'nullable|numeric',
            'price' => 'required|numeric|min:0',
            'special_price' => 'nullable|numeric|min:0|lt:price',
            'special_price_from' => 'nullable|date',
            'special_price_to' => 'nullable|date|after_or_equal:special_price_from',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'related_product' => 'nullable|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'thumb_image' => 'image|max:2048',
            'banner_images.*' => 'image|max:2048',
        ]);

        if ($request->has('delete_banner_images')) {
            foreach ($request->delete_banner_images as $imageId) {
                $product->deleteMedia($imageId);
            }
        }

        // Handle new banner images upload
        if ($request->hasfile('banner_images')) {
            foreach ($request->file('banner_images') as $image) {
                $product->addMedia($image)->toMediaCollection('banner_images');
            }
        }

        // Handle new thumb images upload
        if ($request->hasFile('thumb_image') && $request->file('thumb_image')->isValid()) {
            $product->clearMediaCollection('image');
            $product->addMediaFromRequest('thumb_image')->toMediaCollection('image');
        }

        $name = $request->name;
        $url_key = strtolower(preg_replace('/[^a-zA-Z\s]/', '', $name));
        $url_key = str_replace(' ', '-', $url_key);

        $related_product = "";

        if ($request->related_product) {
            $related_product = implode(',', $request->related_product);
        }

        if ($request->qty == 0) {
            $stock_status = 1; // not in stock
        } elseif ($request->qty <= 5) {
            $stock_status = 2; // few stock
        } else {
            $stock_status = 3; // in stock

        }
        // dd($stock_status);


        $upData = [
            "name" => $name,
            "status" => $request->status,
            "is_featured" => $request->is_featured,
            "qty" => $request->qty,
            "stock_status" => $stock_status,
            "weight" => $request->weight,
            "price" => $request->price,
            "special_price" => $request->special_price,
            "special_price_from" => $request->special_price_from,
            "special_price_to" => $request->special_price_to,
            "description" => $request->description,
            "related_product" => $related_product,
            "meta_tag" => $request->meta_tag,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
            "url_key" => $url_key,
            "short_description" => $request->short_description,
        ];

        $product->update($upData);

        if ($request->attr_value) {

            ProductAttribute::where('product_id', $id)->delete();
            foreach ($request->attr_value as $value_id) {

                $attr_value = AttributeValue::where('id', $value_id)->first();
                ProductAttribute::create([
                    'product_id' => $id,
                    'attribute_id' => $attr_value->attribute_id,
                    'attributevalue_id' => $value_id,
                ]);
            }
        }

        $product->categories()->sync($request->category ?? []);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // abort_if(Gate::denies('product_destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index');
    }
}
