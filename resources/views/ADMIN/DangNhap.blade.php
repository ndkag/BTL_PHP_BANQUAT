<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            background-color: #F9F9F9;
        }

        .form-control {
            margin: auto;
            background-color: #ffffff;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
            width: 400px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 10px;
            padding: 25px;
            border-radius: 8px;
            margin-top: 250px;
        }

        .title {
            font-size: 28px;
            font-weight: 800;
            margin: 10px 0;
        }

        .error {
            color: red;
            margin: 0;

        }

        .input-field {
            position: relative;
            width: 100%;
        }

        .input {
            margin-top: 15px;
            width: 100%;
            outline: none;
            border-radius: 8px;
            height: 45px;
            border: 1.5px solid #ecedec;
            background: transparent;
            padding-left: 10px;
        }

        .input:focus {
            border: 1.5px solid #2d79f3;
        }

        .input-field .label {
            position: absolute;
            top: 25px;
            left: 15px;
            color: #888888;
            transition: all 0.3s ease;
            pointer-events: none;
            z-index: 2;
        }

        .input-field .input:focus~.label,
        .input-field .input:valid~.label {
            top: 5px;
            left: 5px;
            font-size: 12px;
            color: #2d79f3;
            background-color: #ffffff;
            padding-left: 5px;
            padding-right: 5px;
        }

        .submit-btn {
            margin-top: 30px;
            height: 55px;
            background: #f2f2f2;
            border-radius: 11px;
            border: 0;
            outline: none;
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            background: linear-gradient(180deg, #363636 0%, #1b1b1b 50%, #000000 100%);
            box-shadow: 0px 0px 0px 0px #ffffff, 0px 0px 0px 0px #000000;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
            cursor: pointer;
        }

        .submit-btn:hover {
            box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #0000003a;
        }
    </style>
</head>

<body>

    <form action="{{route('admin.login')}}" method="get" class="form-control">
        @csrf
        <p class="title">Đăng nhập</p>
        @if ($errors->has('login'))
        <p class="error">{{ $errors->first('login') }}</p>
        @endif
        <div class="input-field">
            <input required="" class="input" name="TenTaiKhoan" type="text" />
            <label class="label" for="input">Vui lòng nhập tài khoản</label>
        </div>
        <div class="input-field">
            <input required="" class="input" name="MatKhau" type="password" />
            <label class="label" for="input">Vui lòng nhập mật khẩu</label>
        </div>
        <button type="submit" class="submit-btn">Đăng nhập</button>
    </form>


</body>

</html>