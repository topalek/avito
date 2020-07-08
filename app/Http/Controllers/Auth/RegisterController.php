<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\VerifyEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create(
            [
                'name'         => $request['name'],
                'email'        => $request['email'],
                'password'     => bcrypt($request['password']),
                'verify_token' => Str::random(),
                'status'       => User::STATUS_WAIT,
            ]
        );
        Mail::to($user->email)->send(new VerifyEmail($user));
        event(new Registered($user));
        return redirect()->route('login')->with('succes', 'Check your email to verify your account.');
    }

    public function verify($token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login')
                ->with('error', 'Sorry your link cannot be identified.');
        }
        if ($user->status !== User::STATUS_WAIT) {
            return redirect()->route('login')
                ->with('error', 'Your email is already verified.');
        }
        $user->status = User::STATUS_ACTIVE;
        $user->verify_token = User::STATUS_ACTIVE;
        $user->save();
        return redirect()->route('login')
            ->with('success', 'Your email is verified. You can login now');
    }

}
