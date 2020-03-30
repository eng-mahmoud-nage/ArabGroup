<?php 

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller 
{

 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.City.all');
      $records = City::all();
      return view('admin.city.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new City();
    return view('admin.city.create_edit_city', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:cities'
    ]);

    $record = City::create($request->all());
    return redirect(route('city.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = City::find($id);
    return view('admin.city.create_edit_City', compact('record'));
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
        'name' => 'unique:cities,name,'.$id
    ]);

    $record = City::find($id);
    $record->update($request->all());
    return redirect(route('city.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = City::find($id)->delete();
    return redirect(route('city.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
  
}

?>