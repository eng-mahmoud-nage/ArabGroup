<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = Setting::first();
        if(!$s){
            $setting = DB::table('settings')->insert([
                'welcome_msg'   => "orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'contact_msg'   => "orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 
                'about'         => "orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", 
                'phone'         => "01123003488", 
                'mobile'        => "01552913175", 
                'address'       => "el marg", 
                'email'         => "mahmoudn509@gmail.com", 
                'facebook'      => "mahmoudn509@gmail.com", 
                'instagram'     => "mahmoudn509@gmail.com", 
                'twitter'       => "mahmoudn509@gmail.com", 
                'linkedin'      => "mahmoudn509@gmail.com", 
                'youtube'       => "mahmoudn509@gmail.com",
                'whatsapp'      => "mahmoudn509@gmail.com",
                'created_at'    => date('Y-m-d H:i'),
                'updated_at'    => date('Y-m-d H:i'),
            ]);
        }
    }
}
