<?php 

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{


 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $records = User::where('admin',0)->get();
      return view('admin.user.all', compact('records'));
  }

  // /**
  //  * Show the form for creating a new resource.
  //  *
  //  * @return Response
  //  */
  // public function create()
  // {
  //     $record = new User();
  //   return view('admin.user.create&edit_admin', compact('record'));
  // }

  // /**
  //  * Store a newly created resource in storage.
  //  *
  //  * @return Response
  //  */
  // public function store(Request $request)
  // {
  //   $request->validate([
  //       'name' => 'required',
  //       'user_name' => 'required|unique:users',
  //       'phone' => 'required|unique|users',
  //       'email' => 'required|unique:users',
  //       'address' => 'required',
  //       'password' => 'required|min:8',
  //       'city_id' => 'required',

  //   ]);
  //   $request->merge(['password' => Hash::make($request->input('password'))]);
    
  //   return redirect(route('user.index'))->with('success', __('تمت الاضافه بنجاح'));
  // }

  // /**
  //  * Display the specified resource.
  //  *
  //  * @param  int  $id
  //  * @return Response
  //  */
  // public function show($id)
  // {
    
  // }

  // /**
  //  * Show the form for editing the specified resource.
  //  *
  //  * @param  int  $id
  //  * @return Response
  //  */
  // public function edit($id)
  // {
  //   $record = User::find($id);
  //   return view('admin.user.create&edit_admin', compact('record'));
  // }

  // /**
  //  * Update the specified resource in storage.
  //  *
  //  * @param  int  $id
  //  * @return Response
  //  */
  // public function update(Request $request, $id)
  // {
  //   $request->validate([

  //   ]);

  //   $record = User::find($id);
  //   $request->merge(['password' => Hash::make($request->input('password'))]);
  //   $record->update($request->except('active', 'password','admin'));
  //   return redirect(route('user.index'))->with('success', __('تم التعديل بنجاح'));
  // }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = User::find($id)->delete();
    return redirect(route('user.index'))->with('Warrning', __('تم الحذف بنجاح'));
  }
}

?>