<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function __construct(){
        $this->middleware('guest')->except(
            [
                'logout', 'dashboard'
            ]
            );
    }

    /**
     * Display a registration form
     * @return Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function register(){
        return view('auth.register');
     }

    /**
     * This will store registration form data for new users
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function store(Request $request){
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

















































        
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('You have successfully registered and logged in!');
     }

     /**
     * Display dashboard to authenticated users
     * @return Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function dashboard(){
        if (Auth::check()) {
            $users = User::all();
            return view('auth.dashboard', compact('users'));
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Please login to access the dashboard'
        ])->onlyInput('email');
     }

     /**
     * Display login page
     * @return Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function login(Request $request){
        return view('auth.login');

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(
                [
                    'email' => 'Invalid email or password'
                ]
                );
        }
     }

     /**
     * This will logout the use from application
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->withSuccess('Successfully logged out!');

     }

     /**
     * This will autheticate the user
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     * @author Jeram Calbe
     */

     public function authenticate(Request $request){
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in');
        }

        return response(back()->withErrors(
            [
                'email' => 'Your provided credentials do not math in our records.'
            ]
        )->onlyInput('email'));
     }
}
