<?php 
class StudentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('students')->delete();

        ini_set("auto_detect_line_endings", true);
        
        
        $file = fopen(app_path().'/database/seeds/students.csv', 'r');
        if ($file) {
            $groups = [];
                
            while (($buffer = fgetcsv($file, 80, ';')) !== false) {
                //On crée les différents groupes distincts
                $group = $buffer[2];
                if(!in_array($group,$groups)){ 
                    $groups[] = $group;
                    
                    $newGroup = new Group;
                    $newGroup->name = $group;
                    $newGroup->save();
                }

                //L’identifiant de l’année d’études est le deuxième caractère du nom du groupe
                //2285 signifie donc un groupe de deuxième année infographie
                $yearIdInGroup = $group[1];

                switch($yearIdInGroup){
                    case 1: $level = 'première'; break;
                    case 2: $level = 'deuxième'; break;
                    case 3: $level = 'troisième'; break;
                }
                //On crée l’étudiant
                $newStudent = new Student;
                $newStudent->name = $buffer[0];
                $newStudent->first_name = $buffer[1];
                $newStudent->email = $buffer[3];
                $newStudent->photo = NULL;
                $newStudent->level_id = Level::whereName($level.' année infographie')->first()->id;
                $newStudent->save();                


                //Création de la relation entre l’étudiant et son groupe
                $newStudent->groups()->attach($newGroup);

            }
            

            if (!feof($file)) {
                echo "Erreur: fgetcsv() a échoué\n";
                return;
            }
            
            fclose($file);
        }
    }
        
}