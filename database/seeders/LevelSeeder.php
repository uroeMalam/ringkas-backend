<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LevelSeeder extends Seeder
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
                "level" => "super Admin",
                "deskripsi" => "super admin - level 1",
                "created_at" => Carbon::now()->toDateTimeString()
            ],
            [
                "id" => 2,
                "level" => "Admin",
                "deskripsi" => "admin - level 2",
                "created_at" => Carbon::now()->toDateTimeString()
            ],
            [
                "id" => 3,
                "level" => "Member",
                "deskripsi" => "member - level 3",
                "created_at" => Carbon::now()->toDateTimeString()
            ],
        ];
        DB::table("public.tb_level")->insert($data);
    }
}
