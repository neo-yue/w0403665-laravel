<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role_userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=DB::table('roles')->where('name','=','User Administrator')->first();
        $moderator=DB::table('roles')->where('name','=','Moderator')->first();
        $theme=DB::table('roles')->where('name','=','Theme Manager')->first();

        DB::table('role_user')->insert([
            'user_id'=>'1',
            'role_id'=>$admin->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('role_user')->insert([
            'user_id'=>'2',
            'role_id'=>$moderator->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('role_user')->insert([
            'user_id'=>'3',
            'role_id'=>$theme->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
