<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use Session;

class AdminController extends Controller
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

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
 
        if (\Auth::attempt(['email' => $email, 'password' => $password]))
        {   
            return \Redirect::intended('/admin/dashboard');
        }
 
        return \Redirect::back()
            ->withInput()
            ->withErrors('That email/password does not exist.');
    }

    public function getDashboard() {
        $users = $this->userRepository->getUsers();
        return view('admin.dashboard', array('users' => $users));
    }
    
    public function addUser(Request $request) {
            if ($request->isMethod('post'))
            {
                $name = $request->input ('name');
                $email = $request->input ('email');
                $password = $request->input ('password');
                $response = $this->userRepository->addUser($name, $email, $password);
                Session::flash('message', $response['message']);
            }
            else
            {
                Session::forget('message');
            }
            return view('admin.useradd');
    }
    
    public function editUser($userId, Request $request) {
        if($request->input ('id'))
           $userId = $request->input ('id');
        $user = $this->userRepository->getUser($userId);
        if($user) {
            if ($request->isMethod('post'))
            {
                $name = $request->input ('name');
                $email = $request->input ('email');
                $response = $this->userRepository->updateUser($userId, $name, $email);
                $user = $this->userRepository->getUser($userId);
                Session::flash('message', $response['message']);
            }
            return view('admin.useredit', array('user' => $user));
        }
        else
        {
            return "User does not exists";
        }
    }
    
    public function deleteUser(Request $request)
    {
        $userId = $request->input ('id');
        $this->userRepository->deleteUser($userId);
        return \Redirect::intended('/admin/dashboard');
    }

    public function listProduct() {
        $products = $this->productRepository->getProducts();
        return view('admin.listproducts', array('products' => $products));
    }
    
    public function addProduct(Request $request) {
            if ($request->isMethod('post'))
            {
                $name = $request->input ('name');
                $description = $request->input ('description');
                $price = $request->input ('price');
                $response = $this->productRepository->addProduct($name, $description, $price);
                Session::flash('message', $response['message']);
            }
            else
            {
                Session::forget('message');
            }
            return view('admin.productadd');
    }
    
    public function editProduct($productId, Request $request) {
        if($request->input ('id'))
           $productId = $request->input ('id');
        $product = $this->productRepository->getProduct($productId);
        if($product) {
            if ($request->isMethod('post'))
            {
                $name = $request->input ('name');
                $description = $request->input ('description');
                $price = $request->input ('price');
                $response = $this->productRepository->updateProduct($productId, $name, $description, $price);
                $product = $this->productRepository->getProduct($productId);
                Session::flash('message', $response['message']);
            }
            return view('admin.productedit', array('product' => $product));
        }
        else
        {
            return "Product does not exists";
        }
    }
    
    public function deleteProduct(Request $request)
    {
        $productId = $request->input ('id');
        $this->productRepository->deleteProduct($productId);
        return \Redirect::intended('/admin/listproducts');
    }
 
    public function getLogout()
    {
        \Auth::logout();
        return \Redirect::intended('/admin');
    }
}
