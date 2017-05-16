<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('truncate users;');
        DB::statement('truncate type_pages;');
        DB::statement('truncate pages;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        factory(\App\Models\CmsModels\User::class, 1)->create(['password'=>bcrypt('2g47'),'email'=>'admin@admin.ru']);
        factory(\App\Models\CmsModels\TypePage::class, 1)->create();
        factory(\App\Models\CmsModels\Page::class, 6)->create();

    }
}
