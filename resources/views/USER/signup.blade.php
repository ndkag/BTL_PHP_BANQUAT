@extends('USER.layout')

@section('title','Đăng Ký')

@section('main')
<div class="form_logsign">

  <form action="{{route('sign.save')}}" method="post" class="form_sign">
    @csrf
    @if(session('success'))
    <div class="success">{{ session('success') }}</div>
    @endif
    <p class="title_sign">Đăng ký </p>
    <p class="message">Đăng ký ngay bây giờ để thành V.I.P </p>
    
    <label>
      <input class="input" type="text" name="TenTaiKhoan" placeholder="" required="">
      <span>Tên tài khoản</span>
      @if ($errors->has('TenTaiKhoan'))
      <p class="error">{{ $errors->first('TenTaiKhoan') }}</p>
      @endif
    </label>

    <label>
      <input class="input" type="email" name="Email" placeholder="" required="">
      <span>Email</span>
      @if ($errors->has('Email'))
      <p class="error">{{ $errors->first('Email') }}</p>
      @endif
    </label>
    <label>
      <input class="input" type="text" name="SDT" placeholder="" required="">
      <span>Số điện thoại</span>
      @if ($errors->has('SDT'))
      <p class="error">{{ $errors->first('SDT') }}</p>
      @endif
    </label>
    <label>
      <input class="input" type="password" name="MatKhau" placeholder="" required="">
      <span>Mật khẩu</span>
    </label>
    <label>
      <input class="input" type="password" name="XacNhanMatKhau" placeholder="" required="">
      <span>Xác nhận mật khẩu</span>
      @if ($errors->has('XacNhanMatKhau'))
      <p class="error">{{ $errors->first('XacNhanMatKhau')}}</p>
      @endif
    </label>

    <button class="submit">Đăng ký</button>
    <p class="signin">Bạn muốn đăng nhập ? <a href="/signin">Đăng nhập</a> </p>
  </form>
</div>

@endsection