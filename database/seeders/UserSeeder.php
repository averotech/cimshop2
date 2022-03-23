<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Admin
       $user = DB::table('users')->insert([
        'name' => "مدير النظام",
        'name_en' => "Admin",
        'email' => "admin@cim.com",
        'password' => Hash::make('root1111'),
        'is_admin'=> 1,
        'created_at' => Carbon::now()
     ]);
    }
}
