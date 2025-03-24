<?php

namespace App\Http\Controllers;

use App\Components\Helper;
use App\Constants\CommonConstants;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Nette\Utils\Random;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Product = new Product();
        return $this->save($request, $Product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ref_no
     * @return \Illuminate\Http\Response
     */
    public function edit($ref_no)
    {
        $product = Product::where('ref_no', $ref_no)->firstOrFail();

        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ref_no
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref_no)
    {
//        dd($ref_no);
        $Product = Product::where('ref_no', $ref_no)->first();
        return $this->save($request,$Product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $ref_no
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref_no)
    {
//        dd($ref_no);
        $product = Product::where('ref_no', $ref_no)->first();

        if ($product->image && \Storage::exists('public/' . $product->image)) {
            \Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }


    private function save(Request $request, Product $Product)
    {
        $isNewRecord = true;
        if ($Product->id != null) {
            $isNewRecord = false;
        }
        $rules = [
            'name'  => ['required', 'max:255'],
            'price' => ['required', 'numeric','min:1'],
            'image' => [$Product->id ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png', 'max:1024','min:500'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($isNewRecord) {
                return redirect()->route('product.create')->withErrors($validator)->withInput();
            } else {
                return redirect()->route('product.edit', $Product->ref_no)->withErrors($validator)->withInput();
            }
        }

        $Product->ref_no = mt_rand(100000, 999999);
        $Product->name = $request->input('name');
        $Product->price = $request->input('price');
        $Product->description = $request->input('desc');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('uploads', 'public');
            $Product->image = $filePath;
        }

        if ($isNewRecord) {
            $Product->save();
        } else {
            $Product->update();
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

}
