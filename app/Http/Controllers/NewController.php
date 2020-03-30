<?php 

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewController extends Controller 
{

 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.News.all');
      $records = News::all();
      return view('admin.news.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new News();
    return view('admin.news.create_edit_news', compact('record'));
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
      'description' => 'required',
      'sources.*' => 'required|image|mimes:png,jpg,gif,jpeg',
    ]);



    $record = News::create($request->except('source'));
    if($request->hasFile('sources')){

    foreach($request->file('sources') as $source){
        $record->images()->create(['source' => uploadImage($source)]);
  }
}

    return redirect(route('news.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = News::find($id);
    return view('admin.news.create_edit_news', compact('record'));
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
      'sources.*' => 'image|mimes:png,jpg,gif',
    ]);

    $record = News::find($id);
    $record->update($request->except('source'));

    if($request->hasFile('sources')){
      foreach($request->file('sources') as $source){
        $record->images()->create(['source' => uploadImage($source)]);

  }
}
    return redirect(route('news.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = News::find($id)->delete();
    return redirect(route('news.index'))->with('warrning', __('تم الحذف بنجاح'));
  }


  public function destroyImage(Request $request)
  {
    $record = News::find($request->new_id);
    $old = $record->images()->where('id', $request->img_id)->first();
    $remove =  $record->images()->where('id', $request->img_id)->delete();
    if($remove){
      if(File::exists(public_path('/news/images'))) {
        $f = File::delete(public_path('/news/images/'.$old->source));
        return response()->json(['success'=>'Status change successfully.', 'data' => $f]);
    }
    }
    // return redirect()->back()->with('warrning', __('تم حذف الصوره بنجاح'));

  }
  
}

?>