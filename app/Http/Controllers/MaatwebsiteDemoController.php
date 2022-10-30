<?php

namespace App\Http\Controllers;
use Log;
use DB;  
// use Input;
use Importer;
use Exporter;
use App\items;
use Validator;
use DownloadExcel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
// use SebastianBergmann\Exporter\Exporter;
class MaatwebsiteDemoController extends Controller
{
    public function importExport()  
    {  
        return view('importExport');  
    }  
    public function downloadExcelxls(Request $request)  
    {    
        
        Log::info("message");
        // return $item = items::all();
        return Excel::download(new Exporter, 'book1.xls');
    }  
    public function downloadExcelxlsx(Request $request)  
    {    
        
        Log::info("message");
        return $item = items::all();
        return Excel::download(new Exporter, 'book1.xlsx');
    }
    public function downloadExcelcsv(Request $request)  
    {    
        
        Log::info("message");
        return $item = items::all();
        return Excel::download(new Exporter, 'book1.xls');
    }
    public function importExcel(Request $request)  
    {  
        // if(Input::hasFile('import_file')){  
        //     $path = Input::file('import_file')->getRealPath();  
        //     $excelData = Excel::toArray(new items, request()->file('import_file'), 's3');
             
            
            
        //     if(!empty($data) && $data->count()){  
        //         foreach ($data as $key => $value) {  
        //             $insert[] = ['title' => $value->title, 'description' => $value->description];  
        //         }  
        //         if(!empty($insert)){  
        //             DB::table('items')->insert($insert);  
        //             dd('Insert Record successfully.');  
        //         }  
        //     }  
        // }  
        // return back();; 
        // if(Input::hasFile('import_file')){
        //     $path = Input::file('import_file')->getRealPath();
        //     echo $path;
        //     $data = Excel::import($path,function($reader){});
        //             echo $data;
        // }
        // $data = $request->all();
        // $file =$request->file('import_file');
        // var_dump($file);
        
    //    return response()->json($file);
    // $excelData = new items();
    // $request->file('import_file');
    
    // return $request->save();
    $mst = new items();
    $validator = Validator::make($request->all(),[
        'import_file' => 'required | max:5000|mimes:xlsx,xls,csv'
    ]);
    if ($validator->passes()) {
        $dateTime = date('Ymd_His');
        $file = $request->file('import_file');
        $fileName = $dateTime . '-' . $file->getClientOriginalName();
        $savePath = public_path('/upload/');
        $file->move($savePath,$fileName);
        # code...
        $excel = Importer::make('Excel');
        $excel->load($savePath.$fileName);
        $collection = $excel->getCollection();
        if (sizeof($collection[1])==5) {
           for ($row=1; $row <sizeof($collection); $row++) { 
              try{
                  return response()->json($collection);
              }catch(\Exception $e){
                return "jao bhai";
              }
           }
        }else 
        {
            return "renedo bhai";
        }
    }
     
    return "file upload sucessfully";
    }  
}
