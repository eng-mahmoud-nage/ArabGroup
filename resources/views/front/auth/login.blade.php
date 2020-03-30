@extends('front.index')

@section('style')
    
@endsection

@section('title')
    {{__('تسجيل دخول')}}
@endsection

@section('url')
    login
@endsection

@section('content')
<div id="account-login" class="container">
    <ul class="breadcrumb" style="width:75%">
        <li><a href="{{url('fronts/welcome')}}">الرئيسيه</a></li>
        <li><a href="#" disabled>الحساب</a></li>
        <li><a href="#">@yield('title')</a></li>
        </ul>
        <div class="row text-right">
                  <div id="content" class="col-md-9 col-sm-8 col-xs-12">
        <div class="row">
            @include('front.auth.account')

          <div class="col-md-6 col-xs-12">
            <div class="well">
              <h2 class="heading">{{__('تسجيل دخول')}}</h2>
            <form action="{{url('fronts/user-logins')}}" id="quickForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label class="control-label" for="input-email">{{__('اسم المستخدم')}}</label>
                  <input type="text" name="user_name" value="" placeholder="{{__('اسم المستخدم')}}" id="input-email" class="form-control  @error('user_name') is-invalid @enderror" required/>
                  @error('user_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">{{__('كلمه السر')}}</label>
                  <input type="password" name="password" value="" placeholder="{{__('كلمه السر')}}" id="input-password" class="form-control @error('password') is-invalid @enderror" required/><br>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <a href="{{url('fronts/user-forgot-pass')}}">{{__('استعادة كلمه السر')}}</a></div>
                <input type="submit" value="{{'تسجيل'}}" class="btn btn-primary" />
                            </form>
            </div>
          </div>
        </div>
        </div>
  </div>
  </div>
@endsection

@push('scripts')

@endpush