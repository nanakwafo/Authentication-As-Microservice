<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 18/02/2020
 * Time: 10:17
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class userappSeeder extends Seeder
{
    public function run ()
    {
        DB::table ('userapps')->insert ([

            'email'    => 'nanamensah1140@gmail.com',
            'password' => Hash::make ('password'),
        ]);
    }
}