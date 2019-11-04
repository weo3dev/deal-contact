<?php

namespace WEO3;

require "../../vendor/autoload.php";

use WEO3\DatabaseConnect;

class FormSave
{

    private static $instance = null;
    private $validData = [];
    private $dbConnect;


    private function __construct($data)
    {

        $this->dbConnect = new DatabaseConnect();

        $this->validData = $data;
        $this->saveContent();
    }

    public static function getInstance($data)
    {
        if(!self::$instance)
        {
            self::$instance = new FormSave($data);
        }

        return self::$instance;
    }

    private function saveContent()
    {

        $phoneHasData = (isset($this->validData['phone'])) ? $this->validData['phone'] : '';

        $newContact = array(
            'contact_name' => $this->validData['name'],
            'contact_email' => $this->validData['email'],
            'contact_phone' => $phoneHasData,
            'contact_message' => $this->validData['message']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "contact_info_saved",
            implode(", ", array_keys($newContact)),
            "'" . implode("', '", array_values($newContact))."'"
        );

        $stmt = $this->dbConnect->dbc->prepare($sql);
        $stmt->execute();
        if($stmt->affected_rows === 0)
        {
            // unable to save data
            echo json_encode([
                'status'=>'error',
                'message'=>'Unable to complete process at this time. Please try again later.'            	
            	]);

        } else
        {
            // return all good
            echo json_encode([
                'status'=>'success',
                'message'=>'Your information successfully submitted.'            	
            	]);
        }
        
        $stmt->close();

    }

}