<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $usertData = [["name" => "Admin", "email" => "admin@gmail.com", "role_id" => 1],
                        ["name" => "User One", "email" => "user1@gmail.com", "role_id" => 2],
                        ["name" => "User Two", "email" => "user2@gmail.com", "role_id" => 2],
                        ["name" => "User Three", "email" => "user3@gmail.com", "role_id" => 2]];
        foreach ($usertData as $data) {
            DB::table('users')->insert([
                'role_id'    => $data['role_id'],
                'name'       => $data['name'],
                'email'      => $data['email'],
                'password'   => app('hash')->make('password'),
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
