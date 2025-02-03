<?php
//the response show to user
namespace Router;
class JsonHandler{
    private $data;
    private $jsonData=array();
    public static $jsonFile='src/views/JsonData.json';
    private $userMap=array();


    public function ShowData(){
        $this->jsonData=json_decode(file_get_contents(self::$jsonFile),true);

        //an static user data
        echo json_encode($this->jsonData[0],JSON_PRETTY_PRINT);
        
    }

    public function specifiedUser($id){
        $this->jsonData=json_decode(file_get_contents(self::$jsonFile),true);
        foreach($this->jsonData as $user){
            $this->userMap[$user['ID']]=$user;
        }    
   
        if ($this->userMap[$id]){
            echo json_encode($this->userMap[$id],JSON_PRETTY_PRINT);
        }
        

    }
}

?>