<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class AuthController extends Controller
{
    //
    public function getLoginPage(){
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('students');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function getForgotPasswordPage(){
        return view('auth.resetPage');
    }

    public function requestForgotPasswordLink(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['alertMessage' => __($status) ])
        : back()->withErrors(['email' => __($status) ]);
    }

    public function getPasswordResetPage(Request $request, $token) {
        $email = $request->query('email');
        return view('auth.passwordResetPage',[ 'token' => $token , 'email' => $email ]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'token' => 'required',
            'password' => 'required|confirmed|min:6|max:150'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);
                $user->save();
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('auth.login')->with('alertMessage', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function getToken(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user->tokens()->delete(); // clear old tokens 

        $token = $user->createToken($request->ip())->plainTextToken;
        
        return [
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ];
    }

    public function revokeToken(Request $request) {
        $request->user()->tokens()->delete(); // remove all user tokens 
    
        return [
            'message' => 'Logout successful',
        ];
    }
}
