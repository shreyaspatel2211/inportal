<?php

namespace Wave\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        if(setting('auth.email_or_username')){
            return setting('auth.email_or_username');
        }
        return 'email';
    }

    public function showLoginForm()
    {
        return view('theme::auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if(setting('auth.verify_email') && !$user->verified){
            $this->guard()->logout();
            return redirect()->back()->with(['message' => 'Please verify your email before logging into your account.', 'message_type' => 'warning']);
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // dd($user);
        // if ($user->status !== 'Approved') {
        //     Auth::logout();
        //     return redirect()->back()->withErrors([
        //         'email' => 'Your profile is not approved yet.',
        //     ])->withInput($request->only($this->username()));
        // }
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended('/admin')->with(['message' => 'Successfully logged in.', 'message_type' => 'success']);
    }
    protected function credentials(Request $request)
    {
        $login = $request->input('email');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        return [
            $field => $login,
            'password' => $request->input('password'),
        ];
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }    

    public function logout(){
        Auth::logout();
        return redirect(route('HomePage'));
    }
}
