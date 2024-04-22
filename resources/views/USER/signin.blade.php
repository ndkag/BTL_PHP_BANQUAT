@extends('USER.layout')

@section('title','Đăng Nhập')

@section('main')
<div class="form_logsign">
  <form action="{{ route('signin') }}" method="post" class="form_sign">
    @csrf
    <p class="title_sign">Đăng nhập</p>
    <p class="message">Đăng nhập ngay để trở lại thành V.I.P</p>

    @if ($errors->has('login'))
    <p class="error">{{ $errors->first('login') }}</p>
    @endif

    <label>
      <input class="input" type="text" name="TenTaiKhoan" placeholder="" required="">
      <span>Tên tài khoản</span>
    </label>

    <label>
      <input class="input" type="password" name="MatKhau" placeholder="" required="">
      <span>Mật khẩu</span>
    </label>

    <button class="submit">Đăng nhập</button>
    <p class="signin">Bạn chưa có tài khoản? <a href="/signup">Đăng ký</a></p>
  </form>

</div>


@endsection