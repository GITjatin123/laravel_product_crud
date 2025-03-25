<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection
{
    public $duplicates = [];

    public function collection(Collection $rows)
    {
//        dd($rows);
        $rowsArray = $rows->toArray();

        for ($i = 1; $i < count($rowsArray); $i++) {
            $row = $rowsArray[$i];
            $existingProduct = Product::where('name', $row[0])->where('price', $row[1])->first();
            if ($existingProduct) {
                $this->duplicates[] = [
                    'name' => $existingProduct->name,
                    'price' => $existingProduct->price,
                ];
            } else {
                Product::create([
                    'ref_no'  => mt_rand(100000, 999999),
                    'name'    => $row[0],
                    'price'   => $row[1],
                    'description' => $row[2],
                ]);
            }
        }
    }
}
