<?php 
class YearsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('years')->delete();
        //Rien de très malin ici, juste une création vaguement automatisée
        for($y=2009;$y<2015;$y++){
            $str = $y.'-'.($y+1);
            Year::create(['name' => $str]);
        }
    }
}