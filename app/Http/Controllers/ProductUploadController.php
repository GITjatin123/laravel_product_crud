<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductUploadController extends Controller
{
    public function showUploadForm()
    {
        $product = Product::all();
        return view('upload_file.index',compact('product'));
    }

    public function importExcel(Request $request)
    {
//        dd($request);
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ProductsImport(), $request->file('excel_file'));

        return back()->with('success', 'Products uploaded successfully!');
    }

}
