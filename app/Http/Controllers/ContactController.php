<?php 

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller 
{

   
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $records = Contact::all();
      return view('admin.contact.all', compact('records'));
  }

  // /**
  //  * Show the form for creating a new resource.
  //  *
  //  * @return Response
  //  */
  // public function create()
  // {
  //     $record = new Contact();
  //   return view('admin.contact.edit_contact', compact('record'));
  // }

  // /**
  //  * Store a newly created resource in storage.
  //  *
  //  * @return Response
  //  */
  // public function store(Request $request)
  // {
  //   $request->validate([
  //     'name' => 'required|unique:Contacts'
  //   ]);

  //   $record = Contact::create($request->all());
  //   return redirect(route('Contact.index'))->with('success', __('تمت الاضافه بنجاح'));
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
  //   $record = Contact::find($id);
  //   return view('admin.Contact.edit_Contact', compact('record'));
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
  //       'name' => 'unique:Contacts,name,'.$id
  //   ]);

  //   $record = Contact::find($id);
  //   $record->update($request->all());
  //   return redirect(route('Contact.index'))->with('success', __('تم التعديل بنجاح'));
  // }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Contact::find($id)->delete();
    return redirect(route('contact.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
}

?>