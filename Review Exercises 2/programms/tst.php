<?php

function calc_course_average($course_code){
    $file = file_get_contents("./j.txt");
   // $keywords= "([0-9]) $course_code ";
    //$keywords = preg_quote($keywords);

    if(preg_match_all("/(?:[0-9]*) (?:$course_code) ([0-9]{1,2}(?:\s|$)|[0-9]{1,2}.[0-9]{1,6})/",$file,$matches)) {
        $sum=0;
        foreach ($matches[1] as $val){
            $sum+=(float)$val;
        }
        $average = $sum/count($matches[0]);
        return $average;
    }
}

function calc_student_average($student_id){
    $file = file_get_contents("./j.txt");
    if(preg_match_all("/(?:$student_id) (?:[0-9]*) ([0-9]{1,2}(?:\s|$)|[0-9]{1,2}.[0-9]{1,6})/",$file,$matches)) {
        $sum=0;
        foreach ($matches[1] as $val){
            $sum+=(float)$val;
        }
        $average = $sum/count($matches[0]);
        return  $average;
    }

}
calc_student_average("15");

?>