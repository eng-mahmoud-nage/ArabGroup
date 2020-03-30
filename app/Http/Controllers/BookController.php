<?php 

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BookController extends Controller 
{

 
 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.Book.all');
      $records = Book::all();
      return view('admin.book.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Book();
    return view('admin.book.create_edit_book', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:books',
      'isbn' => 'required',
      'author' => 'required',
      'details' => 'required',
      'publish_date' => 'required',
      'cover_img' => 'required|mimes:png,jpg,gif,jpeg',
      'back_img' => 'mimes:png,jpg,gif,jpeg',
      'pdf' => 'mimes:pdf',
      'weight' => 'required',
      'category_id' => 'required',
      // 'permalink_title' => 'required|unique:books',
      // 'permalink_description' => 'required|unique:books',
      // 'permalink_keyword' => 'required|unique:books',
    ]);

       
    // seo field
    $request->merge(['permalink_title'=> str_replace(' ', '-', $request->name).'-'.time()]);
    $request->merge(['permalink_keyword'=> str_replace(' ', ',', $request->name).','.time()]);
    // $request->merge(['permalink_description'=> substr($request->details, 1, 150).time()]);

    // intial views
    $request->merge(['views' => 0]);
    
    $record = Book::create($request->except('_token', 'cover_img', 'back_img', 'pdf'));
    // image store and make unique name
    if($request->hasFile('cover_img')){
      $record->cover_img = uploadImage($request->cover_img);
    }

    if($request->hasFile('back_img')){
      $record->back_img = uploadImage($request->back_img);
    }
    if($request->hasFile('pdf')){
        $pdf= pathinfo(request()->pdf->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.request()->pdf->getClientOriginalExtension();
        $request->file('pdf')->move(public_path('/book/pdf'), $pdf);
        $record->pdf = $pdf;
    }
    $record->save();
 

    return redirect(route('books.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = Book::find($id);
    return view('admin.book.create_edit_book', compact('record'));
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
        'cover_img' => 'mimes:png,jpg,gif,jpeg',
        'back_img' => 'mimes:png,jpg,gif,jpeg',
        'pdf' => 'mimes:pdf',
    ]);

    
    // seo field
    $request->merge(['permalink_title'=> str_replace(' ', '-', $request->name).'-'.time()]);
    $request->merge(['permalink_keyword'=> str_replace(' ', ',', $request->name).','.time()]);
    $request->merge(['permalink_description'=> substr(strip_tags($request->details), 1, 150).time()]);

    $record = Book::find($id);
    $record->update($request->except('back_img', 'cover_img', 'pdf', 'views'));

    // image store and make unique name
    if($request->hasFile('cover_img')){
      $record->cover_img = uploadImage($request->file('cover_img'));
    }

    if($request->hasFile('back_img')){
      $record->back_img = uploadImage($request->file('back_img'));
    }
    if($request->hasFile('pdf')){
        $pdf= pathinfo(request()->pdf->getClientOriginalName(),PATHINFO_FILENAME).time().'.'.request()->pdf->getClientOriginalExtension();
        $request->file('pdf')->move(public_path('/book/pdf'), $pdf);
        $record->pdf = $pdf;
    }
    $record->save();
    return redirect(route('books.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Book::find($id)->delete();
    return redirect(route('books.index'))->with('warrning', __('تم الحذف بنجاح'));
  }

  
  public function favourite(Request $request)
  {
      $book = Book::find($request->book_id);
      $book->favourite = $request->status;
      $book->save();

      return response()->json(['success'=>'Status change successfully.']);
  }  
  public function views(Request $request)
  {
      $book = Book::find($request->book_id);
      $book->views += 1;
      $book->save();

      return response()->json(['success'=>'Status change successfully.']);
  }
  
}

?>