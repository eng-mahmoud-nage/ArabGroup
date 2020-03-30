<?php

namespace App\Http\Controllers\Front;

use App\Book;
use App\City;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function books(Request $request){
        if($request->flag == 'views'){
            $records = Book::orderBy('views', 'desc')->paginate(12); // take(num) return num of books
        }else if($request->flag == 'features'){
            $records = Book::where('favourite', 1)->orderBy('favourite', 'desc')->paginate(12);
        }else if($request->flag == 'latest'){
            $records = Book::orderBy('publish_date', 'desc')->paginate(12);
        }else if(isset($request->category_id) && $request->category_id != null){
            $records = Book::where('category_id', $request->category_id)->orderBy('favourite', 'desc')->paginate(12);
        }else if(isset($request->name) && $request->name != null){
            $records = Book::where('name', '%'.$request->name.'%')->orderBy('id', 'desc')->paginate(12);
        }else{
            $records = Book::all();
        }
        return view('front.book.all', compact('records'));

    }

    public function book($id){
        $record = Book::find($id);
        return view('front.book.show', compact('record'));
    }

    public function new($id){
        $record = News::find($id);
        return view('front.news.show', compact('record'));
    }

    public function news(){
        $records = News::all();
        return view('front.news.all', compact('records'));
    }

    public function country(){
        $countries = Country::all();
        if($countries)
            return responseJson(1, 'success', $countries);
        else
            return responseJson(0, 'no data');

    }
    public function city(Request $request){
        if($request->has('country_id')){
            $cities = City::where('country_id', $request->country_id)->get();
            if($cities)
                return responseJson(1, 'success', $cities);
            else
                return responseJson(0, 'no data');
        }

    }

}
