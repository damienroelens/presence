<?php 
class LevelsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('levels')->delete();

        Level::create(['name' => 'première année infographie']);
        Level::create(['name' => 'deuxième année infographie']);
        Level::create(['name' => 'troisième année infographie']);
    }

}