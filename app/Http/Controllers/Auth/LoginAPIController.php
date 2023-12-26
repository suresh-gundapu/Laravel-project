<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginAPIController extends Controller
{
  /**
   * Instantiate a new LoginRegisterController instance.
   */
  public function __construct()
  {
    $this->middleware('guest')->except([
      'logout', 'dashboard'
    ]);
  }

  public function dashboard()
  {
    if (Auth::check()) {
      return view('home');
    } else {

      return redirect(url('/'))->with('error', "our provided credentials do not match in our records.");
    }
  }
  public function login()
  {

    return view('auth.login_api');
  }
  public function register()
  {

    return view('auth.register');
  }

  public function loginAction(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required',
      ]);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      $credentials = [
        'username' => $request->username,
        'password' =>  $request->password
      ];
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect(url('dashboard'))->with('success', "You have successfully logged in!");
      } else {
        return redirect(url('/'))->with('error', "our provided credentials do not match in our records.");
      }
    } catch (\Exception $e) {
      return redirect(url('/'))->with('error', $e->getMessage());
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(url('/'))->with('success', "You have logged out successfully!");
  }
}
