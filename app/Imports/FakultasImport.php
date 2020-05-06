<?php

namespace App\Imports;

use App\Fakultas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FakultasImport implements ToModel
{
    /**
    
    * @return int

    */

    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fakultas([
            'nama_fakultas' => $row[1]    
        ]);
    }
}
