<?php 
class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        //Rien de bien malin ici, on crée juste les cours un à un

        Course::create([
                        'level_id' => Level::whereName('troisième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Projets Web, labo',
                        'description' => 'Un cours durant lequel les étudiants font des projets web'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('deuxième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Design Web, labo',
                        'description' => 'Un cours durant lequel les étudiants apprennent CSS'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('deuxième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Design Web, théorie',
                        'description' => 'Un cours consacré à l’utilisabilité et l’accessibilité'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('deuxième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Typographie, théorie',
                        'description' => 'Un cours de typographie pour les foules'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('deuxième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Programmation côté serveur, labo',
                        'description' => 'Un cours pour apprendre à programmer un serveur web avec PHP'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('deuxième année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Multimédia Interactif, labo',
                        'description' => 'Un cours pour apprendre à programmer des animations interactives avec Javascript'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('première année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Création de pages web, théorie',
                        'description' => 'Un cours d’introduction aux technologies clientes utilisées dans la création de pages web'    
                        ]);
        Course::create([
                        'level_id' => Level::whereName('première année infographie')->first()->id,
                        'year_id' => Year::whereName('2013-2014')->first()->id,
                        'name' => 'Création de pages web, labo',
                        'description' => 'Un cours d’introduction aux technologies clientes utilisées dans la création de pages web'    
                        ]);

    }

}