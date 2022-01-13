<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection, WithHeadingRow
{

    private $cate;

    public function __construct()
    {
        $this->cate = Category::select('id','cat_name')->get();
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $category = $this->cate->where('cat_name',$row['cat_name'])->first(); 

            $user = Category::create([
                'cat_name' => $row['cat_name'], 
            ]);

           $transaction = Product::create([
                'cat_id'=>$category->id ?? NULL,
                'pro_name'=>$row['pro_name'],
                'stock'=>$row['stock'],
                'slug'=>$row['slug'],
                'desc'=>$row['desc'],
                'price'=>$row['price'],
                'status'=>$row['status'],
           ]);
        }

    }
}
