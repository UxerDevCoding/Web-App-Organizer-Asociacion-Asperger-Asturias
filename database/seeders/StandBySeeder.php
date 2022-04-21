<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Role;
use App\Models\User;

class StandBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(10)->create();

        for ($id = 5; $id <= 14; $id++) {
            DB::table('role_user')->insert(
                [
                    'role_id' => Role::select('id')->where('id', 1)->first()->id,
                    'user_id' => User::select('id')->where('id', $id)->first()->id,
                ]
            );
        }

    }
}
