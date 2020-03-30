<?php 

namespace App\Http\Controllers;

use App\MailList;
use Illuminate\Http\Request;

class MailListController extends Controller 
{

 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $records = MailList::all();
      return view('admin.maillist.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new MailList();
    return view('admin.maillist.create_edit_MailList', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|unique:mail_lists',
    ]);

    $record = MailList::create($request->all());
    return redirect(route('maillist.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = MailList::find($id);
    return view('admin.maillist.create_edit_maillist', compact('record'));
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
        'email' => 'unique:mail_lists,email,'.$id
    ]);

    $record = MailList::find($id);
    $record->update($request->all());
    return redirect(route('maillist.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = MailList::find($id)->delete();
    return redirect(route('maillist.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
}

?>