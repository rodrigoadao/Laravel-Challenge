<?php

namespace App\Exports;

use App\Models\Filial;
use Maatwebsite\Excel\Concerns\FromCollection;

class FilialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Filial::show();
    }
}
