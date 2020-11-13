<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
 
 
class AuthController extends Controller
{
    public function username()
    {
        return 'user_name';
    }
    public function getAuthPassword()
    {
        return $this->password; // default return $this->password;
    }
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('login');
        }
        // return view('login');
    }
 
    public function login(Request $request)
    {
    //     $rules = [
    //         'user_name'                 => 'required|string',
    //         'password'              => 'required|string'
    //     ];
 
    //     $messages = [
    //         'email.required'        => 'Email wajib diisi',
    //         'email.email'           => 'Email tidak valid',
    //         'password.required'     => 'password wajib diisi',
    //         'password.string'       => 'password harus berupa string',
    //         'user_name.required'     => 'user_name wajib diisi',
    //         'user_name.string'       => 'user_name harus berupa string'
    //     ];
 
    //     $validator = Validator::make($request->all(), $rules, $messages);
 
    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput($request->all);
    //     }
 
        $data = [
            'user_name'     => $request->input('user_name'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('home');
        }
 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'password wajib diisi',
            'password.confirmed'    => 'password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
 
 
}