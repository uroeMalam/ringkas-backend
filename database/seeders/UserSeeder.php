<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        
        $data = [
            [
                "id" => 1,
                "name" => "ricoo",
                "email" => "ricoo@ringkas.ai",
                "email_verified_at" => Carbon::now()->toDateTimeString(),
                "password" => Hash::make("admin"),
                "id_level" => 1,
                "created_at" => Carbon::now()->toDateTimeString()
            ],
        ];
        DB::table("public.users")->insert($data);
    }
}
