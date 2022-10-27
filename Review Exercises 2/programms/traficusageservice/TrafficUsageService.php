<?php

class TrafficUsageService
{
    public $traffic_usage_dao;
    public $traffic_usages;

    public function __construct($traffic_usage_dao)
    {
        $this->traffic_usage_dao = $traffic_usage_dao;
        $this->traffic_usages = $traffic_usage_dao->loadAll();
    }

    public function socialMediaLovers($year, $month)
    {

$intendedUsers=[];

foreach ($this->traffic_usages as $traffic_usage){
    $date= $traffic_usage->date;

    $userYear =(int)substr($date,0,2);
    $userMonth = (int)substr($date,3,2);

    if($year==$userYear && $month==$userMonth) {

        if (!$traffic_usage->internal) {
            $usage = $traffic_usage->usage;
            $user= $traffic_usage->user;
            if(key_exists(strval($user),$intendedUsers)){
                $intendedUsers["$user"]+=$usage;
            }else{
                $intendedUsers["$user"]=$usage;
            }
        }
    }
}

arsort($intendedUsers);

  $i=  ceil(count($intendedUsers)*0.1);

  $intendedUsers = array_slice($intendedUsers, 0, 1);

  $finalUsers=[];
foreach ($intendedUsers as $key=>$val){
    $finalUsers[]=$key;
}

return $finalUsers;


    }

    public function downloadLovers($year, $month)
    {
        $intendedUsers=[];

        foreach ($this->traffic_usages as $traffic_usage){
            $date= $traffic_usage->date;

            $userYear =(int)substr($date,0,2);
            $userMonth = (int)substr($date,3,2);

            if($year==$userYear && $month==$userMonth) {
                    $usage = $traffic_usage->usage;
                    $user= $traffic_usage->user;
                    $nightly= $traffic_usage->nightly;
                    if(key_exists(strval($user),$intendedUsers)){
                        if($nightly)
                            $intendedUsers["$user"][0]+=$usage;
                        else
                            $intendedUsers["$user"][1]+=$usage;

                    }else{
                        if($nightly)
                            $intendedUsers["$user"]=array($usage,0);
                        else
                            $intendedUsers["$user"]=array(0,$usage);
                    }

            }
        }







        $finalUsers=[];
        foreach ($intendedUsers as $key=>$val){
            if($val[0]>$val[1])
                $finalUsers[]=$key;
        }

        return $finalUsers;

    }
}
//new TrafficUsage($user_a100, true, false, 100, )


    ?>