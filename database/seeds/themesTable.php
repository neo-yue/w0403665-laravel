<?php

use Illuminate\Database\Seeder;

class themesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name'=>'Cerulean',
            'cdn_url'=>'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css',
            'created_by'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('themes')->insert([
            'name'=>'Cyborg',
            'cdn_url'=>'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css',
            'created_by'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('themes')->insert([
            'name'=>'Cerulean',
            'cdn_url'=>'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css',
            'created_by'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('themes')->insert([
            'name'=>'Darkly',
            'cdn_url'=>'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css',
            'created_by'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('themes')->insert([
            'name'=>'Journal',
            'cdn_url'=>'https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/journal/bootstrap.min.css',
            'created_by'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

    }
}
