<?php

use Illuminate\Database\Seeder;
use App\UserManagement;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserManagement::truncate();
        UserManagement::insert([
            [
                'name'=>'Admin',
                'email'=>'admin@lb.in' , 
                'password'=>bcrypt('12345678'), 
                'role'=>'1',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'user',
                'email'=>'user@lb.in' , 
                'password'=>bcrypt('12345678'), 
                'role'=>'2',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ]);
    }
}
