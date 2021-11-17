<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'User Administrator',
            'description'=>'User Administrator',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('roles')->insert([
            'name'=>'Moderator',
            'description'=>'A moderator facilitates, reviews, and guides a discussion
            to ensure all shared content is appropriate
            and follows community rules.',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('roles')->insert([
            'name'=>'Theme Manager',
            'description'=>'Theme Manager',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
