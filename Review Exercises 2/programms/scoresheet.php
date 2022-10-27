<?php
function toGrade($string){
    $information = explode(" ",$string);
    //print_r($information);
    $obj= new Grade($information[0],$information[1],$information[2]);
    return $obj;
}


class Grade{
    public int $student_id;
    public int $course_code;
    public float $score;

    function __construct ($id,$code,$score){
        $this->student_id=(int)$id;
        $this->course_code=(int)$code;
        $this->score=(float)$score;
    }
}

class CourseUtil{
    private $fileAddress;

    function set_file($address){
        $this->fileAddress =$address;
    }

    function load($line_number){
       $fileHandle= fopen($this->fileAddress,"r");
       for($i=1;$i<=$line_number;$i++){
           $line = fgets($fileHandle);
           if($i==$line_number){
               return toGrade($line);
               break;
           }

       }
       fclose($fileHandle);
    }

    function save($grade){
if(!file_exists($this->fileAddress)) {$handle = fopen($this->fileAddress, "a+");}
    $file = file_get_contents($this->fileAddress);
    if (!preg_match("/$grade->student_id $grade->course_code/", $file)) {
        $string ="";
        if($file != "" )
            $string="\n";
        $string.=$grade->student_id . " " . $grade->course_code . " " . $grade->score;
        //echo $string;
        file_put_contents($this->fileAddress, $file . $string);
    }

    }


    function calc_course_average($course_code){
        $file = file_get_contents($this->fileAddress);
        // $keywords= "([0-9]) $course_code ";
        //$keywords = preg_quote($keywords);

        if(preg_match_all("/(?:[0-9]*) (?:$course_code) ([0-9]{1,2}(?:\s|$)|[0-9]{1,2}.[0-9]{1,6})/",$file,$matches)) {
            $sum=0;
            foreach ($matches[1] as $val){
                $sum+=(float)$val;
            }
            $average = (float)($sum/count($matches[1]));
            return $average;
        }
    }


    function calc_student_average($student_id){
        $file = file_get_contents($this->fileAddress);
        if(preg_match_all("/(?:$student_id) (?:[0-9]*) ([0-9]{1,2}(?:\s|$)|[0-9]{1,2}.[0-9]{1,6})/",$file,$matches)) {
            $sum=0;
            foreach ($matches[1] as $val){
                $sum+=(float)$val;
            }
            $average = $sum/count($matches[1]);
            return  $average;
        }

    }

    function count(){
        $linecount = 0;
        $handle = fopen("$this->fileAddress", "a+");
        while(!feof($handle) && fgets($handle)!=""){
            $linecount++;
        }
        return $linecount;
    }



}



$util = new CourseUtil();
$util->set_file("./kl.txt");
//echo $util->count();

//$grade = new Grade(30, 3, 16);
//$util->save($grade);
//echo $util->count();


//echo $util->count();

echo "\n".$util->calc_course_average(3);
//var_dump($util->load(2));*/
?>

