<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $student = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3,
            'is_login' => '0',
        ];

        $lecturer = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
            'is_login' => '0',
        ];

        $staff = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'is_login' => '0',
            'is_admin' => '0'
        ];

        $staffadmin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'is_login' => '0',
            'is_admin' => '1'
        ];

        if(Auth::attempt($student)){
            $this->isLogin(Auth::id());
            return redirect()->route('student.event.index');
        } elseif(Auth::attempt($lecturer)){
            $this->isLogin(Auth::id());
            return redirect()->route('lecturer.event.index');
        } elseif(Auth::attempt($staff)){
            $this->isLogin(Auth::id());
            return redirect()->route('home');
        } elseif(Auth::attempt($staffadmin)){
            $this->isLogin(Auth::id());
            return redirect()->route('admin.individual.index');
        }


        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'is_login' => '0',
        ]);

        $request->session()->invalidate();
        return $this->LoggedOut($request) ?: redirect('login');
    }

    public function isLogin(int $id)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }
}
