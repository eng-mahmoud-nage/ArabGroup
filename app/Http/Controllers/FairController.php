<?php 

namespace App\Http\Controllers;

use App\Fair;
use Illuminate\Http\Request;

class FairController extends Controller 
{

 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.Fair.all');
      $records = Fair::all();
      return view('admin.fair.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Fair();
    return view('admin.fair.create_edit_fair', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'bail|required',
      'location' => 'required',
      'date' => 'required',
      'pdf' => 'required|mimes:pdf',
    ]);

    $record = Fair::create($request->except('pdf'));
    
    if($request->hasFile('pdf')){
      $pdf= pathinfo(request()->pdf->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.request()->pdf->getClientOriginalExtension();
      $request->file('pdf')->move(public_path('/fairs/pdf'), $pdf);
      $record->pdf = $pdf;
      $record->save();
  }
    return redirect(route('fair.index'))->with('success', __('تمت الاضافه بنجاح'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Fair::find($id);
    return view('admin.fair.create_edit_fair', compact('record'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'pdf' => 'mimes:pdf'
    ]);

    
    $record = Fair::find($id);
    $record->update($request->except('pdf'));
    
    if($request->hasFile('pdf')){
      $pdf= pathinfo(request()->pdf->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.request()->pdf->getClientOriginalExtension();
      $request->file('pdf')->move(public_path('/fairs/pdf'), $pdf);
      $record->pdf = $pdf;
      $record->save();
  }

    return redirect(route('fair.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Fair::find($id)->delete();
    return redirect(route('fair.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
  
}

?>