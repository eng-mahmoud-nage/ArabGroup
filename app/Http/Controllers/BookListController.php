<?php 

namespace App\Http\Controllers;

use App\BookList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookListController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.BookList.all');
      $records = BookList::all();
      return view('admin.bookList.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new BookList();
    return view('admin.bookList.create_edit_bookList', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    $request->validate([
      'title' => 'required',
      'source' => 'required|file|mimes:xls,xlsx,pdf',
    ]);

    $record = BookList::create($request->except('source'));
    if($request->hasFile('source')){
        $excel= pathinfo( $request->source->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$request->source->getClientOriginalExtension();
        $request->source->move(public_path('/booklist/excel'), $excel);
        $record->source = $excel ;
        $record->save();
}

    return redirect(route('booklist.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = BookList::find($id);
    return view('admin.bookList.create_edit_bookList', compact('record'));
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
      'source' => 'required|file|mimes:xls,xlsx,pdf',
    ]);

    $record = BookList::find($id);
    $record->update($request->except('source'));

    if($request->hasFile('source')){

      $old = $record->source;
      $excel= pathinfo($request->source->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.$request->source->getClientOriginalExtension();
      $request->source->move(public_path('/booklist/excel'), $excel);
      $record->source = $excel ;
      $done = $record->save();
      
      if($done){
        if(File::exists(public_path('/booklist/excel'))) {
          $f = File::delete(public_path('/booklist/excel/'.$old));
        }else{
          return redirect()->back()->with('danger', __('هذا المسار غير موجود'));
        }
      }else{
        return redirect()->back()->with('danger', __('من فضلك اعد المحاوله'));
      }
}
    return redirect(route('booklist.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = BookList::find($id);
    $old = $record->source;
    
    $del = $record->delete();
    if($del){
      if(File::exists(public_path('/booklist/excel'))) {
        $f = File::delete(public_path('/booklist/excel/'.$old));
      }else{
        return redirect()->back()->with('danger', __('هذا المسار غير موجود'));
      }
    }else{
      return redirect()->back()->with('danger', __('من فضلك اعد المحاوله'));
    }
    return redirect(route('booklist.index'))->with('warrning', __('تم الحذف بنجاح'));
  }  

}

?>