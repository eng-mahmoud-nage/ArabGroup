<?php 

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller 
{

 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.user.all');
      $records = User::where('admin', 1)->get();
      return view('admin.admin.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new User();
    return view('admin.admin.create_edit_admin', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'user_name' => 'required|unique:users',
      'password' => 'required',
    ]);
    $request->merge(['password' => Hash::make($request->input('password'))]);
    $record = User::create($request->except('admin'));
    $record->admin = 1;
    $record->save();
    return redirect(route('admins.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = User::find($id);
    return view('admin.admin.create_edit_admin', compact('record'));
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
      'user_name' => 'unique:users,user_name,'.$id,
    ]);
    $record = User::find($id);
    $record->update($request->except('password','admin','active'));
    if($request->has('active')){

    }
    return redirect(route('admins.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = User::find($id)->delete();
    return redirect(route('admins.index'))->with('warrning', __('تم الحذف بنجاح'));
  }

  public function changeStatus(Request $request)
  {
      $user = User::find($request->user_id);
      $user->active = $request->status;
      $user->save();

      return response()->json(['success'=>'Status change successfully.']);
  }
}

?>