<?php

namespace App\Http\Controllers\Front;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
  {
      $request->validate([
          'email' => 'required|unique:users',
          'user_name' => 'required|unique:users',
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required|min:11',
          'city_id' => 'required',
          'password' => 'required',
          'confirm' => 'required_with:password|same:password',
      ]);

      $request->merge(['password' => Hash::make($request->password)]);
      $record = User::create($request->all());
      if($record){
          return redirect('fronts/welcome')->with('success', __('تمت الاضافه بنجاح <br> مرحبا بك فى المجموعه العربيه للنشر'));
      }else{
        return redirect('fronts/user-register')->with('danger', __('من فضلك اعد المحاوله مره اخرى'));
      }
  }

      public function login(Request $request)
  {
      $request->validate([
          'user_name' => 'required|exists:users',
          'password' => 'required'
      ]);
      
      $record = User::where('user_name', $request->user_name)
      ->where('admin', 0)->first();

      if ($record) {
          if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password, 'active' => 1, 'admin' => 0])) {                
            return redirect('fronts/welcome');
          } else {
              return redirect('fronts/user-login')->with('danger', __('من فضلك تاكد من كلمه السر'));
          }
      } else {
        return redirect('fronts/user-login')->with('danger', __('هذا البريد غير موجود'));
    }
  }
  
  public function profile(Request $request, $id)
  {
      $request->validate([
        'email' => 'unique:users,email,'.$id,
        'user_name' => 'unique:users,user_name,'.$id,
        'phone' => 'min:11',
        'confirm' => 'required_with:password|same:password',
      ]);

    if($request->has('password')){
        $request->merge(['password' => Hash::make($request->password)]);
    }

      $record = User::where('email', $request->email)->first();
      if ($record) {
              $record->update(['password' => Hash::make($request->password)]);
              return redirect('/sys-login')->with('success', _("lang.pass_confirm"));
          }
          return redirect('/sys-login')->with('danger', _("lang.pass_not_confirm"));

      }
}
