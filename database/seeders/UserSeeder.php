<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'abc',
            'email'=>'abc@gmail.com',
            'password'=> Hash::make('abcd1234'),
            'profile'=>'ねこが好き',
            ]);
        DB::table('users')->insert([
            'name'=>'xyz',
            'email'=>'xyg@gmail.com',
            'password'=> Hash::make('xyg12345'),
            'profile'=>'よろしく'
            ]);
    }
}
