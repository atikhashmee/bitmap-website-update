<?php

use Illuminate\Database\Seeder;

class HomeStyelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home_style_arr = [];
        for ($i=0; $i < 5; $i++) { 
            $home_style_arr[] = [
                "home_style_title" => "home".$i,
                "status" => 0,
                "created_at" => now()
            ];
        }
        \DB::table('home_styles')->insert($home_style_arr);
    }
}
