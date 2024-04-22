<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaiKhoanController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->search;

        // Lọc dữ liệu theo từ khóa tìm kiếm nếu có
        $query = TaiKhoan::query();
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('TenTaiKhoan', 'like', '%' . $search . '%')
                    ->orWhere('MaTaiKhoan', 'like', '%' . $search . '%')
                    ->orWhere('Email', 'like', '%' . $search . '%');
            });
        }

        // Phân trang cho kết quả
        $db = $query->paginate(10);
        return view('ADMIN.TaiKhoan.index', ['tk' => $db, 'search' => $search]);
    }

    public function create()
    {
        return view('ADMIN.TaiKhoan.edit');
    }

    public function save(Request $res, $id)
    {

        if ($id == 0) {
            //create
            $tk = new TaiKhoan();
            $tk->TenTaiKhoan = $res->TenTaiKhoan;
            $tk->Email = $res->Email;
            $tk->SDT = $res->SDT;
            $tk->MatKhau = $res->MatKhau;
            $tk->Quyen = $res->Quyen;
        } else {
            //upload 
            $tk = TaiKhoan::where('MaTaiKhoan', $id)->first();
            $tk->TenTaiKhoan = $res->TenTaiKhoan;
            $tk->Email = $res->Email;
            $tk->SDT = $res->SDT;
            $tk->MatKhau = $res->MatKhau;
            $tk->Quyen = $res->Quyen;
        }
        $tk->save();
        return redirect()->route('ADMIN.TaiKhoan.index');
    }

    public function admin_login(Request $request)
    {
        $tenTaiKhoan = $request->TenTaiKhoan;
        $matKhau = $request->MatKhau;

        // Kiểm tra xem tài khoản có tồn tại không
        $taiKhoan = TaiKhoan::where('TenTaiKhoan', $tenTaiKhoan)->first();
        // dd($tenTaiKhoan, $matKhau, $taiKhoan);
        if (!$taiKhoan || $matKhau != $taiKhoan->MatKhau) {
            return back()->withErrors(['login' => 'Tên tài khoản hoặc mật khẩu không đúng']);
        } elseif (2 == $taiKhoan->Quyen) {
            return back()->withErrors(['login' => 'Tài khoản không tồn tại']);
        }
        $request->session()->put('tka', $taiKhoan);

        // Chuyển hướng đến trang chính sau khi đăng nhập thành công
        return redirect()->route('admin.index');
    }
    public function admin_logout(Request $request)
    {
        Session::forget('tka');
        return view('ADMIN.DangNhap');
    }

    public function signup(Request $res)
    {
        // Kiểm tra xác nhận mật khẩu
        if ($res->MatKhau !== $res->XacNhanMatKhau) {
            return redirect()->back()->withInput()->withErrors(['XacNhanMatKhau' => 'Xác nhận mật khẩu không khớp !']);
        }

        // Kiểm tra xem tên tài khoản đã tồn tại chưa
        $existingUsername = TaiKhoan::where('TenTaiKhoan', $res->TenTaiKhoan)->first();
        if ($existingUsername) {
            return redirect()->back()->withInput()->withErrors(['TenTaiKhoan' => 'Tên tài khoản đã tồn tại !']);
        }

        // Kiểm tra xem email đã tồn tại chưa
        $existingEmail = TaiKhoan::where('Email', $res->Email)->first();
        if ($existingEmail) {
            return redirect()->back()->withInput()->withErrors(['Email' => 'Email đã tồn tại !']);
        }

        // Kiểm tra xem số điện thoại đã tồn tại chưa
        $existingPhone = TaiKhoan::where('SDT', $res->SDT)->first();
        if ($existingPhone) {
            return redirect()->back()->withInput()->withErrors(['SDT' => 'Số điện thoại đã tồn tại !']);
        }

        // Thêm tài khoản mới vào cơ sở dữ liệu
        $tk = new TaiKhoan();
        $tk->TenTaiKhoan = $res->TenTaiKhoan;
        $tk->Email = $res->Email;
        $tk->SDT = $res->SDT;
        $tk->MatKhau = $res->MatKhau;
        $tk->Quyen = 2; //khách hàng
        $tk->save();
        session()->flash('success', 'Đăng ký tài khoản thành công!');
        return redirect()->back();
    }



    public function signin(Request $request)
    {

        $tenTaiKhoan = $request->TenTaiKhoan;
        $matKhau = $request->MatKhau;

        // Kiểm tra xem tài khoản có tồn tại không
        $taiKhoan = TaiKhoan::where('TenTaiKhoan', $tenTaiKhoan)->first();
        // dd($tenTaiKhoan, $matKhau, $taiKhoan);
        if (!$taiKhoan || $matKhau != $taiKhoan->MatKhau) {
            return back()->withErrors(['login' => 'Tên tài khoản hoặc mật khẩu không đúng']);
        }

        if (session('KhachHang')) {
            Session::forget('KhachHang');
        }
        $db = KhachHang::where('MaTaiKhoan', $taiKhoan->MaTaiKhoan)->first();
        if ($db) {
            $request->session()->put('KhachHang', $db);
        }

        // Lưu thông tin tài khoản vào session
        $request->session()->put('TaiKhoan', $taiKhoan);

        // Chuyển hướng đến trang chính sau khi đăng nhập thành công
        return redirect()->route('index');
    }



    public function signout()
    {
        Session::forget('TaiKhoan');
        Session::forget('KhachHang');

        return redirect()->route('index');
    }


    public function edit($id)
    {
        $db = TaiKhoan::where('MaTaiKhoan', $id)->first();
        return view('ADMIN.TaiKhoan.edit', ['tk' => $db]);
    }


    public function myaccount()
    {
        $taikhoan = session('TaiKhoan');
        return view('USER.myaccount', ['tk' => $taikhoan]);
    }


    public function destroy($id)
    {
        TaiKhoan::where('MaTaiKhoan', $id)->first()->delete();
        return redirect()->route('ADMIN.TaiKhoan.index');
    }
}
