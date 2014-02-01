<?php 
class CourseStudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('course_student')->delete();

        //Les cours sont associés à des levels et les étudiants à des groupes.
        //Comme ce sont les données de l’école virtuelle, les groupes correspondent
        //aux levels.
        //La logique ici est donc de mettre en rapport le deuxième chiffre
        //du numéro de groupe de l’étudiant avec un level. Par le biais
        //du level, on récupère les cours qui concernent l’étudiant

        $levels = ['première année infographie','deuxième année infographie','troisième année infographie'];
        
        $students = Student::with('groups')->get();
        $courses = Course::all();

        foreach($students as $student){
            $groupName = $student->groups[0]->name;
            foreach ($courses as $course) {
                if($course->level_id == Level::whereName($levels[$groupName[1]-1])->first()->id)
                {
                    $student->courses()->attach($course);
                }
            }
        }
    }

}