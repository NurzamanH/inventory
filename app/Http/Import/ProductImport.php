<?php

namespace App\Http\Import;

use App\Models\Product;
use App\Models\UserSave;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithStartRow, WithValidation
{

    /**
     * @return int
     */

    public function  __construct()
    {
    }

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'description' => $row[1],
            'first_price' => $row[2],
            'price' => $row[3],
            'enabled' => $row[4],
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => 'required',
        ];
    }
}
