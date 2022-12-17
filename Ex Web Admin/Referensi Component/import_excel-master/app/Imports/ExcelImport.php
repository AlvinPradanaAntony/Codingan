<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        DB::table('import_excels')->truncate();
        foreach($collection as $key => $value)
        {
            if($key > 0)
            {
                DB::table('import_excels')->insert([

                    'No'	   =>$value[0]
                    ,'Name'    =>$value[1]
                    ,'Sex'     =>$value[2]
                    ,'Age'     =>$value[3]

                ]);
            }
        }
    }
}
