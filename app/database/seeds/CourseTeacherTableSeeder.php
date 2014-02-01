<?php 
class CourseTeacherTableSeeder extends Seeder {

    public function run()
    {
        DB::table('course_teacher')->delete();

        // Rien de bien malin ici, on attache les cours aux profs manuellement

        Course::whereName('Projets Web, labo')->first()->teachers()->attach(Teacher::whereEmail('dominique.vilain@hepl.be')->first());
        Course::whereName('Design Web, labo')->first()->teachers()->attach(Teacher::whereEmail('myriam.dupont@hepl.be')->first());
        Course::whereName('Design Web, théorie')->first()->teachers()->attach(Teacher::whereEmail('myriam.dupont@hepl.be')->first());
        Course::whereName('Création de pages web, labo')->first()->teachers()->attach(Teacher::whereEmail('myriam.dupont@hepl.be')->first());
        Course::whereName('Création de pages web, labo')->first()->teachers()->attach(Teacher::whereEmail('vinciane.lovinfosse@hepl.be')->first());
        Course::whereName('Création de pages web, labo')->first()->teachers()->attach(Teacher::whereEmail('pierre.worontzoff@hepl.be')->first());
        Course::whereName('Création de pages web, labo')->first()->teachers()->attach(Teacher::whereEmail('francois.parmentier@hepl.be')->first());
        Course::whereName('Création de pages web, théorie')->first()->teachers()->attach(Teacher::whereEmail('myriam.dupont@hepl.be')->first());
        Course::whereName('Typographie, théorie')->first()->teachers()->attach(Teacher::whereEmail('maelle.vivegnis@hepl.be')->first());
    }

}