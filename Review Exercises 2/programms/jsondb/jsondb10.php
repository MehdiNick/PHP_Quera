<?php
class JsonDB
{
    private string $jsonFilesAddress;

    public function __construct($address = __DIR__)
    {
        $this->jsonFilesAddress = $address;
    }
//--------------------------------------------------------------------------------------------------------------------
    public function insert($tableName, array $columns)
    {

        if (file_exists($this->jsonFilesAddress . "/" . $tableName . ".json")) {
            $address=$this->jsonFilesAddress . "/" . $tableName . ".json";
            $usersArray = json_decode(file_get_contents($address), true);
            //----checking if the data has any extra column
            foreach ($columns as $key => $val) {
                if (!key_exists($key, $usersArray["schema"])) {
                    throw new Exception("Column $key not found");
                    break;
                }
            }
            //------ main job
            $jsonDataToWrite = [];

            foreach ($usersArray["schema"] as $schemaColumn => $schemaColumnProperty) {
                if (key_exists($schemaColumn, $columns)) {
                    $jsonDataToWrite[$schemaColumn] = $columns[$schemaColumn];
                } else {
                    if (key_exists("default", $schemaColumnProperty)) {
                        $jsonDataToWrite[$schemaColumn] = $schemaColumnProperty["default"];
                    } else if ($schemaColumnProperty["nullable"] == True) {
                        $jsonDataToWrite[$schemaColumn] = NULL;
                    } else {

                        throw new Exception("No value provided for column $schemaColumn");

                    }
                }


            }

            $repetitive = false;
            foreach ($usersArray["data"] as $user) {
                $arr = array_intersect($user, $jsonDataToWrite);
                if (count($arr) == count($jsonDataToWrite)) {
                    $repetitive = true;
                    break;
                }

            }


            if (!$repetitive) {
                array_push($usersArray["data"], $jsonDataToWrite);
                file_put_contents($address, json_encode($usersArray));
            }


        }else{
            throw new Exception("Table $tableName not found");
        }


    }
//-------------------------------------------------------------------------------------------------------------------

    public function select($tableName, $columns=Null)
    {
        if (file_exists($this->jsonFilesAddress . "/" . $tableName . ".json")) {
            $address=$this->jsonFilesAddress . "/" . $tableName . ".json";
            $usersArray = json_decode(file_get_contents($address), true);

            if($columns==null){

        return $usersArray["data"];
            }else {

                $results=$usersArray["data"];
                //----checking if the data has any extra column
                foreach ($columns as $key => $val) {
                if (!key_exists($key, $usersArray["schema"])) {
                    throw new Exception("Column $key not found");
                    break;
                }
                    foreach ( $results as $keyy=>$user) {
                    if($user[$key]!=$val){
                        unset($results[$keyy]);
                    }
                    }
            }
            return array_values($results);
            }

        }else{
            throw new Exception("Table $tableName not found");
        }

    }
//------------------------------------------------------------------------------------------


    public function update($tableName, $newColumns,$oldColumns=Null)
    {
        if (file_exists($this->jsonFilesAddress . "/" . $tableName . ".json")) {
            $address=$this->jsonFilesAddress . "/" . $tableName . ".json";
            $usersArray = json_decode(file_get_contents($address), true);

            if($oldColumns==null) {

                foreach ($newColumns as $key => $val) {
                    if (!key_exists($key, $usersArray["schema"])) {
                        throw new Exception("Column $key not found");
                        break;
                    }
                    foreach ($usersArray["data"] as &$user) {
                        //echo "hi";
                        $user[$key]=$val ;
                        //echo "\n".$user[$key];
                    }
                }

            } else {

                foreach ($oldColumns as $key => $val) {
                    if (!key_exists($key, $usersArray["schema"])) {
                        throw new Exception("Column $key not found");
                        break;
                    }
                }
                foreach ($newColumns as $key => $val) {
                    if (!key_exists($key, $usersArray["schema"])) {
                        throw new Exception("Column $key not found");
                        break;
                    }

                }

                foreach ($usersArray["data"] as &$user) {
                    $r = true;
                    foreach ($oldColumns as $keyy => $matchVal) {
                        if ($user[$keyy] != $matchVal)
                            $r = false;
                    }
                    if ($r) {
                        foreach ($newColumns as $key => $val) {
                            $user[$key] = $val;
                        }
                    }
                }
            }








           // print_r($usersArray);
        file_put_contents($address,json_encode($usersArray));
        }else{
            throw new Exception("Table $tableName not found");
        }

    }

//------------------------------------------------------------------------------------------


    public function delete($tableName, $Columns=Null)
    {
        if (file_exists($this->jsonFilesAddress . "/" . $tableName . ".json")) {
            $address=$this->jsonFilesAddress . "/" . $tableName . ".json";
            $usersArray = json_decode(file_get_contents($address), true);

            if($Columns==null) {


                    $usersArray["data"]=[];


            } else {

                foreach ($Columns as $key => $val) {
                    if (!key_exists($key, $usersArray["schema"])) {
                        throw new Exception("Column $key not found");
                        break;
                    }
                }


                foreach ($usersArray["data"] as $userkey=>&$user) {
                    $r = true;
                    foreach ($Columns as $keyy => $matchVal) {
                        if ($user[$keyy] != $matchVal)
                            $r = false;
                    }
                    //var_dump($r);
                    if ($r) {
                        foreach ($Columns as $key => $val) {
                            unset($usersArray["data"][$userkey]);
                        }
                    }
                }
            }








            // print_r($usersArray);
            file_put_contents($address,json_encode($usersArray));
        }else{
            throw new Exception("Table $tableName not found");
        }

    }
//----
}



//$db = new JsonDB(__DIR__ );
//$db->delete('users2');
//$db->update('users', ['first_name' => 'Mohammad'], ['first_name' => 'Ali']);

?>