<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::insert([
            [
                'role_name'=>'Admin',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'role_name'=>'User',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ]);
    }
}
