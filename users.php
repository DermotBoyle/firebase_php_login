<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Users {

    protected $database;
    protected $dbname = 'users';

    public function __construct(){
        $acc = ServiceAccount::FromJsonFile( __DIR__ .'/secret/phplogin-5ae2c-709212d386f8.json');
        $firebase = (new Factory)->withServiceAccount($acc)->create();


        $this->database = $firebase->getDatabase();
    }

    public function get(int $userID = NULL){
        if (empty($userID) || !isset($userID)){
            return FALSE;
        }

        if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userID)){
                return $this->database->getReference($this->dbname)->getChild($userID)->getValue();
        } else {
            return FALSE;
        }

    }


    public function update(array $data){
        if (empty($data) || !isset($data)){
            return FALSE;
        }
            foreach($data as $key => $value){
                $this-> database->getReference()->getChild($this->dbname)->getChild($key)->set($value);
            }

            return TRUE;       
    }


    public function delete(int $userID){
        if (empty($userID) || !isset($userID)){
            return FALSE;
        }

        if($this->getReference($this->dbname)->getSnapshot()->hasChild($userID)){
            $this->getReference($this->dbname)->getChild($userID)->remove();
            return TRUE;
        } else {
            return FALSE;
        }
    }

}


$users = new Users();



var_dump($users->get(1));




?>