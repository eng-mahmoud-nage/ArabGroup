<?php

namespace App\Http\Controllers\Front;

use App\Book;
use App\User;
use App\BookOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->check()){
            $records = BookOrder::where('user_id', auth()->user()->id)
            ->where('order_id', 0)->get();

        if ($records) {
            if($request->ajax())
            return responseJson(1, 'successfuly process', $records->toArray());
            else
                return view('front.cart.cart', compact('records'));
        } else {
            return responseJson(3, 'no data');
        }
        } else {
            return responseJson(0, 'user not authenticated');
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check() && $request->has('book_id')) {

            $BookOreder = BookOrder::where('book_id', $request->book_id)->where('order_id', 0)->first();

            if($BookOreder != null){
                return responseJson(2, 'order exists');
            }

            if($request->has('quantity')){
                $q = $request->quantity;
            }else{
                $q = 1;
            }
            // get book data
            $book = Book::find($request->book_id);
            // set item to database without product
            $item = BookOrder::create([
                'book_id' => $book->id,
                'order_id' => 0,
                'user_id' => auth()->user()->id,
                'price' => $book->price,
                'weight' => $book->weight,
                'quantity' => $q,
                'session_id' => 0,
            ]);
            if($request->ajax())
                return responseJson(1, 'successfuly process');
            else
                return redirect()->back()->with('success', 'تمت الاضافه بنجاح');

        } else {
            
            if($request->ajax())
                return responseJson(0, 'missing data');
            else
                return redirect()->back()->with('success', 'تمت الاضافه بنجاح');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|min:0',
        ]);

        if (auth()->check() && $id != null) {
            // set item to database without product
            $record = BookOrder::where('book_id', $id)->update($request->all());
            if($request->ajax())
            return responseJson(1, 'successfuly process');
        else
            return redirect()->back()->with('success', 'تمت الاضافه بنجاح');

    }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $record = BookOrder::find($id);
        if($record){
            $remove = $record->delete();
            if ($remove) {
                if($request->ajax())
                return responseJson(1, 'successfuly process');
            else
                return redirect()->back()->with('success', 'تمت الحذف بنجاح');
            } else {
                if($request->ajax())
                return responseJson(0, 'missing data');
            else
                return redirect()->back()->with('danger', 'حدث خطأ من فضلك حاول مره اخرى');
            }
        }else{
            if($request->ajax())
            return responseJson(0, 'data not found');
        else
            return redirect()->back()->with('danger', 'هذا المنتج غير موجود');
        }

      
    }
}
