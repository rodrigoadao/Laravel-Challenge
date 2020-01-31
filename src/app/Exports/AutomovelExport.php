<?php

namespace App\Exports;

use App\Models\Automovel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class AutomovelExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        $ids = explode(",",$_POST['ids']);
        return Automovel::query()->whereIn('id',$ids);
    }
}
