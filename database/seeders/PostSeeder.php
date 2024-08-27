<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id'=>1,
            'category_id'=>1,
            'lock'=>true,
            'body'=>'こんにちは',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => Null,
            ]);
         DB::table('posts')->insert([
            'user_id'=>2,
            'category_id'=>2,
            'lock'=>true,
            'body'=>'おはよう',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => Null,
            ]);
    }
}
