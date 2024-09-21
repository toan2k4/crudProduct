<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeItem;
use App\Http\Requests\StoreAttributeItemRequest;
use App\Http\Requests\UpdateAttributeItemRequest;

class AttributeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $idThuocTinh = $request->input('idThuocTinh');
        $attribute = Attribute::where('id', $idThuocTinh)->firstOrFail();
        // dd($attribute);
        $attributeItems = AttributeItem::with('attribute')->where('attribute_id',$idThuocTinh)->get();
        return view('admins.attributeItems.index', compact('attributeItems','attribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $attributeItems = AttributeItem::get();
    //     return view('admins.attributeItems.create', compact('attributeItems'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeItemRequest $request)
    {
        AttributeItem::create($request->except('_token'));
        return redirect()->back()->with('success', 'Thêm thuộc tính thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeItem $attributeItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeItem $attributeItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttributeItemRequest $request, AttributeItem $attributeItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeItem $attributeItem)
    {
        //
    }
}
