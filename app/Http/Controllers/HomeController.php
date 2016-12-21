<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function homePage()
    {
        return view('user.home');
    }
    
    public function loginPage()
    {
        return view('user.login');
    }
    
    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
 
        if (\Auth::attempt(['email' => $email, 'password' => $password]))
        {   
            return \Redirect::intended('/');
        }
 
        return \Redirect::back()
            ->withInput()
            ->withErrors('That email/password does not exist.');
    }
    
    public function signupPage()
    {
        return view('user.signup');
    }
    
    public function postSignup(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $response = $this->userRepository->addUser($name, $email, $password);
        if($response['status'])
        {
            if (\Auth::attempt(['email' => $email, 'password' => $password]))
            {   
                return \Redirect::intended('/');
            }
        }
 
        return \Redirect::back()
            ->withInput()
            ->withErrors($response['message']);
    }
    
    public function getLogout()
    {
        \Auth::logout();
        return \Redirect::intended('/');
    }
}
