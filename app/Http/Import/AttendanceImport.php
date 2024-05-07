<?php

namespace App\Http\Import;

use App\Models\Attendance;
use App\Models\UserSave;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AttendanceImport implements ToModel, WithStartRow, WithValidation
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
        // dd($row);
        return new Attendance([
            'name' => $row[0],
            'status' => $row[1],
            'date' => $row[2],
            'is_late' => $row[3],
            'is_overtime' => $row[4],
            'noted' => $row[5],

        ]);
    }

    public function rules(): array
    {
        return [
            '0' => 'required',
            '1' => 'required',
            // so on
        ];
    }
}
