<?php

use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NoteSeeder extends Seeder
{

    public function run()
    {
        DB::table('note')->insert($this->getArray());
    }



    public function getArray()
    {
        $result = [];

        $users = new Users();
        $users = $users->get();

        foreach($users as $value)

        for($i = 0; $i < 10; $i++) {

            $result[] = [
                'users_id' => $value->id,
                'title' => 'Title - '.$i. '(user - '. $value->id .')',
                'description' => 'Description - '. '(user - '. $value->id .')',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $result;
    }

}
