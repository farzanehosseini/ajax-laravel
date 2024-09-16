<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('getData');
});

//Route::post('/getData', function (Request $request) {
   // var_dump($request);exit;
/*
    return (request()->all());
    $validator=\Validator::make(request->all(),[
        'name'=>'required',
        'pic'=>'required'
    ]);
    if($validator->fails())
    {
        return $validator->errors()->all();
        
    }
*/
//return ($request()->all());

 /*   $file=$request()->file('pic');
    $year = Carbon::now()->year;
    $imagePath = "/upload/images/{$year}/";
    $filename = $file->getClientOriginalName();
    $file = $file->move(public_path($imagePath) , $filename);
  
    return response()->json(['path' => $imagePath . $filename]);
})->name('getData');
*/


Route::post('/getData', function (Request $request) {
    // Check if the request has a file
    if ($request->hasFile('pic')) {
        $file = $request->file('pic');
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();
        $file->move(public_path($imagePath), $filename);
      
        return response()->json(['path' => $imagePath . $filename]);
    } else {
        return response()->json(['error' => 'No file uploaded'], 400);
    }
})->name('getData');



/*







Route::post('/getData', function (Request $request) {
    $filename = $request->input('filename');
    
    // You can process the filename here, e.g., check if the file exists, store it, etc.
    
    return response()->json(['message' => 'File processed successfully,Farzanehhhhhhhh', 'filename' => $filename]);
})->name('getData');
*/
