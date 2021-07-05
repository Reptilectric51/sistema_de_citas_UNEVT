<?php

namespace App\Exports;

use App\Models\citas_quiropractica;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return citas_quiropractica::all();
    }
}
