<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [ 1, "PENDING" ],
            [ 2, "APPROVED" ],
            [ 3, "DISAPPROVED" ],
            [ 4, "DEACTIVATED" ],
        ];

        foreach($statuses as $status) {
            DB::table('user_statuses')->insert([
                'id' => $status[0],
                'name' => $status[1],
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
