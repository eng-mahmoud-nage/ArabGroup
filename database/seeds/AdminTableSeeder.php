<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('admin', 1)->first();
        if(!$admin){
            DB::table('users')->insert([
            'user_name' => 'owner',
            'password' => Hash::make('123456'),
            'admin' => 1,
            'created_at'    => date('Y-m-d H:i'),
            'updated_at'    => date('Y-m-d H:i'),
            ]);
        }
    }
}
