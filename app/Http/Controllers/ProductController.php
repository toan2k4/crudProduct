<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use App\Models\ProductHasAttribute;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductVariantHasAttribute;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admins.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = Attribute::get();
        $categories = Category::get();
        $attributeValues = [];
        foreach ($attributes as $attribute) {
            $attributeValues[$attribute->id] = AttributeItem::where('attribute_id', $attribute->id)
                ->get()
                ->pluck('value', 'id')
                ->toArray();
        }
        return view('admins.products.create', compact('attributes', 'attributeValues', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        try {
            DB::transaction(function () use ($request) {
                dd($request->all());
                $product = Product::query()->create([
                    'category_id' => $request->input('category_id'),
                    'name' => $request->input('name'),
                    // Storage::put('public/img', $request->input('img'))
                    'img' => "img11",
                    'description' => $request->input('description'),
                ]);
                foreach ($request->input('attribute_item') as $attributeName => $attributeValues) {
                    // dd($attributeName,
                    // $attributeValues);
                    // Tìm attribute_id tương ứng với attributeName
                    // dd(array_search($attributeName,
                    // array_keys($request->input('attribute_item'))));
                    // dd($request->input('attribute_id'));
                    $attributeId = $request->input('attribute_id')[array_search(
                        $attributeName,
                        array_keys($request->input('attribute_item'))
                    )];
                    //  dd($attributeId);

                    if ($attributeId) {

                        $product->attribute()->attach($attributeId, ['attribute_item_ids' => json_encode($attributeValues)]);
                    }
                }
                //                 
            });
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admins.products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
