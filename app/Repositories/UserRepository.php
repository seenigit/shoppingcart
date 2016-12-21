<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct()
    {
        
    }

    public function addUser($name, $email, $password)
    {
        $user = User::where('email',$email)->get();
        if($user->isEmpty()) 
        {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->role_id = 2;
            $user->password = app('hash')->make($password);
            try{
                $user->save();
            } catch (Exception $ex) {
                return ['message' => 'Something went wrong, please try again later.'];
            }
            return ['message' => 'User has been added successfully'];
        }
        return ['message' => 'This email id already exists'];
    }

    public function updateUser($userId, $name, $email)
    {
        $user = User::find($userId);
        if($user) 
        {
            $user->name = $name;
            $user->email = $email;
            try{
                $user->save();
            } catch (Exception $ex) {
                return ['message' => 'Something went wrong, please try again later.'];
            }
            return ['message' => 'User has been updated successfully'];
        }
        return ['message' => 'This email id already exists'];
    }

    public function getUsers()
    {
        return User::where('role_id', 2)->get();
    }
    
    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
    }
    
    public function getUser($userId)
    {
        $user = User::find($userId);
        return $user;
    }
}
