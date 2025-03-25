<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ProductUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload_file.index');
    }
    public function importExcel(Request $request)
    {
        $file = $request->file('excel_file');

        $rules = [
            'excel_file' => 'required|mimes:xlsx,csv|max:3060',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!$file) {
            return back()->with('error', 'No file was uploaded.');
        }

        $import = new ProductsImport();

        Excel::import($import, $file);
        if (!empty($import->duplicates)) {
            return $this->exportDuplicates($import->duplicates);
        }

        return back()->with('success', 'Products imported successfully!');
    }


    public function exportDuplicates($duplicates)
    {
        return Excel::download(new class($duplicates) implements FromCollection {
            protected $duplicates;

            public function __construct($duplicates)
            {
                $this->duplicates = $duplicates;
            }

            public function collection()
            {
                return collect($this->duplicates);
            }
        }, 'duplicate_records.xlsx');
    }

}
