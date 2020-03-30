<?php 

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller 
{

 
 /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('admin.Agent.all');
      $records = Agent::all();
      return view('admin.agent.all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Agent();
    return view('admin.agent.create_edit_agent', compact('record'));
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
      'country' => 'required',
    ]);

    $record = Agent::create($request->all());
    return redirect(route('agent.index'))->with('success', __('تمت الاضافه بنجاح'));
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
    $record = Agent::find($id);
    return view('admin.agent.create_edit_agent', compact('record'));
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
        'name' => 'unique:agents,name,'.$id
    ]);

    $record = Agent::find($id);
    $record->update($request->all());
    return redirect(route('agent.index'))->with('success', __('تم التعديل بنجاح'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Agent::find($id)->delete();
    return redirect(route('agent.index'))->with('warrning', __('تم الحذف بنجاح'));
  }
  
}

?>