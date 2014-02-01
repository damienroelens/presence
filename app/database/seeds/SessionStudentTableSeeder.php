<?php 
use Carbon\Carbon as Carbon;

class SessionStudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('session_student')->delete();

        ini_set("auto_detect_line_endings", true);
        
        
        $file = fopen(app_path().'/database/seeds/schedule.csv', 'r');
        if ($file) {
                
            while (($buffer = fgetcsv($file, 80, ';')) !== false) {
                $groupName = $buffer[0];
                $courseName = $buffer[1];
                $weeksCount = $buffer[4];
                $sessionStart = new Carbon($buffer[2]);
                $sessionEnd = new Carbon($buffer[3]);
                //Récupération des étudiants selon leur groupe
                $students = Group::whereName($groupName)->first()->students;
                //Récupération des id min et max des status de présence
                //ça nous permettra d’en ajouter un au hasard à la relation session_student
                $attendancesCollection = Attendance::all();
                $minAttendanceId = $attendancesCollection->first()->id;
                $maxAttendanceId = $attendancesCollection->last()->id;
                $courseId = Course::whereName($courseName)->first()->id;

                //Création des sessions
                for($i=0;$i<$weeksCount;$i++){
                    //Attention, plusieurs cours peuvent avoir le même nom 
                    //et juste être différents parce qu’ils sont liés à une 
                    //année académique différente. Les données de seed créées
                    //pour le moment ne considèrent que l’année 2013-2014, je
                    //n’ai du coup pas pris la précaution de récupérer un cours
                    //selon son année académique
                    $courseSession = CourseSession::create(
                    [
                        'date_start' => $i?$sessionStart->addWeek():$sessionStart,
                        'date_end' => $i?$sessionEnd->addWeek():$sessionEnd,
                        'course_id' => $courseId,
                        'description' => 'à modifier dans l’admin'
                    ]);
                    //Association des étudiants récupérés plus haut avec les sessions créées
                    foreach ($students as $student) {
                        $attence_id = rand($minAttendanceId,$maxAttendanceId);
                        $student->sessions()->attach($courseSession,['attendance_id' => $attence_id]);
                    }    
                }

            }  
        }
            

        if (!feof($file)) {
            echo "Erreur: fgetcsv() a échoué\n";
            return;
        }
        
        fclose($file);
    }
}