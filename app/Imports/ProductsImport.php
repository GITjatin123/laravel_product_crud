<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);
        return new Product([
            'ref_no' => mt_rand(100000, 999999),
            'name' => $row[0],
            'description' => $row[2],
            'price' => $row[1],
        ]);
    }
}
