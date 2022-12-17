<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Session;
use Hash;
use Auth;
use Image;
use Carbon\Carbon;



class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('import_excels')->orderBy('id', 'DESC')->get();
        $user = Auth::user();
        return view('import_excel', compact('data','user',$user));
    }

    function import(Request $request)
    {

        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ],

        [
            'select_file.required' => __('.'),
        ]);

        $file = $request->select_file;
        Excel::import(new ExcelImport ,$file);

        return redirect()->back()->with('success', 'Import successful.!');

    }

    // insert
    public function importInsert(Request $request)
    {
		$request->validate([
                            'No'   => 'required',
                            'Name' => 'required',
                            'Sex'  => 'required',
                            'Age'  => 'required'
                        ]);
        if($request->get('No'))
        {
            $codesExists = $request->get('No');
            $data = DB::table("import_excels")->where('id', $codesExists)->count();
            if($data > 0)
            {
                return redirect()->back()->with('codesExists',"Exit already.!");
            }
            else
            {
                $importInsert = [
                    'No' 	=>	$request->No,
                    'Name' 	=>	$request->Name,
                    'Sex' 	=>	$request->Sex,
                    'Age' 	=>	$request->Age
                ];
                DB::table('import_excels')->insert($importInsert);
                return redirect()->back()->with('importInsert','Insert Sucessful.!');
            }

        }
    }
    // update
	public function importUpdate(Request $request)
	{
		$importUpdate = [
            'id'    =>	$request->idUpdate,
            'No' 	=>	$request->No,
            'Name' 	=>	$request->Name,
            'Sex' 	=>	$request->Sex,
            'Age'   =>	$request->Age
        ];
		DB::table('import_excels')->where('id',$request->idUpdate)->update($importUpdate);
		return redirect()->back()->with('importUpdate' ,'Update Successfull.!');
    }

    // delete
    public function importDelete($importID)
    {
		DB::table('import_excels')->where('id',$importID)->delete();
		return redirect()->back()->with('importDelete','Delect Successfull.!');
	}
}


