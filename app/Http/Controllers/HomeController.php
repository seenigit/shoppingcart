<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;

class HomeController extends Controller
{
        /**
     * Instance of User Repository
     */
    protected $userRepository;
    
    /**
     * Instance of Product Repository
     */
    protected $productRepository;
    
    public function __construct(UserRepository $userRepository,
                                ProductRepository $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
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
    
    public function getProducts()
    {
        $products = $this->productRepository->getProducts();
        $returnHTML = view('user.productsection')->with('products', $products)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
