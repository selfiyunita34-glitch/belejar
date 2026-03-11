<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheetsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new MobilImport(),
            'Sheet2' => new RumahImport(),
        ];
    }

}
