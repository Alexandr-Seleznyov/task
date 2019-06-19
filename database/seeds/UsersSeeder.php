<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert($this->getArray());
    }



    public function getArray()
    {
        $result = [];

        for($i = 0; $i < 10; $i++) {

            $result[] = [
                'email' => 'email-' . $i . '@task.com',
                'password' => bcrypt('pass'.$i),
                'remember_token' => bcrypt($i),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $result;
    }

}
