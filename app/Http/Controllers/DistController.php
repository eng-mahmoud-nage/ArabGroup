<?php 

namespace App\Http\Controllers;

use App\Dist;
use Illuminate\Http\Request;

class DistController extends Controller 
{

 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.Dist.all');
      $records = Dist::all();
      return view('admin.dists.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Dist();
    return view('admin.dists.create_edit_dist', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'address' => 'required',
      'phone' => 'required'
    ]);

    $record = Dist::create($request->all());
    return redirect(route('dists.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = Dist::find($id);
    return view('admin.dists.create_edit_dist', compact('record'));
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

    ]);

    $record = Dist::find($id);
    $record->update($request->all());
    return redirect(route('dists.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Dist::find($id)->delete();
    return redirect(route('dists.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
  
}

?>