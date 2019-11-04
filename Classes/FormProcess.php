<?php

namespace WEO3;

require "../../vendor/autoload.php";

use WEO3\FormSend;
use WEO3\FormSave;

/**
 * Processes data submitted via contact form
 * Validations must pass before data is sent to mail and database
 * 
 */
class FormProcess {

    private static $instance = null;
    private $name;
    private $email;
    private $phone;
    private $message;

    private $minMessage = 10;
    private $messageOK;

    private $errorMessages = [];
    private $validData = [];

    private function __construct() {
        
        // autostart processing data on instantiation
        $this->processData();

    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new FormProcess();
        }

        return self::$instance;
    }

    private function processData() {
        
        // check it all
        $this->name = trim(htmlspecialchars($_POST['name']));
        $this->email = trim(htmlspecialchars($_POST['email']));
        if(isset($_POST['phone'])){
            $this->phone = trim(htmlspecialchars($_POST['phone']));
        } else {
            $this->phone = "";
        }
        $this->message = trim(htmlspecialchars($_POST['message']));

        $this->messageOK = (strlen($this->message) > $this->minMessage) ? true : false;

        // clear errorMessages array
        $this->errorMessages = [];

        $this->requireName();

        $this->validateName();

        $this->requireEmail();

        $this->validateEmail();

        $this->validatePhone();

        $this->requireMessage();

        $this->requireMessageLength();

        if(count($this->errorMessages) > 0) {

            // not passing validations
            // let user try again
            echo json_encode([
                'status'=>'error',
                'message'=>'Please fix the listed errors: ',
            	'errors'=>$this->errorMessages
            	]);            

        } else {

            // package valid data into validData
            $this->validData['name'] = $this->name;
            $this->validData['email'] = $this->email;
            if(!empty($this->phone)) {
                $this->validData['phone'] = $this->phone;
            }
            $this->validData['message'] = $this->message;

            // passed all validations, carry on
            $this->sendFormData();

        }

    }

    private function requireName() {
        if(empty($this->name)) {
            $this->addError('Your name is required.');
        }
    }
    
    private function validateName() {
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $this->name)) {
            $this->addError('Name can only contain letters, numbers and white spaces.');
        }
    }

    private function requireEmail() {
        if(empty($this->email)) {
            $this->addError('Your email is required.');
        }
    }

    private function validateEmail() {
        if(!empty($this->email)) {
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->addError('Please enter a valid email address.');                    
            }
        }
    }

    private function validatePhone() {
        // phone is optional, but if it's there, double check format
        // if(!empty($this->phone)) {
        if(strlen($this->phone > 1)) {
            if(!preg_match('/^\d{3}-\d{3}-\d{4}$/', $this->phone)) {
                $this->addError('Please match phone number format with example format.');
            }
        }
    }

    private function requireMessage() {
        if(empty($this->message)) {
            $this->addError('A message is required to send.');
        }
    }

    private function requireMessageLength() {
        if(!empty($this->message)) {
            if(strlen($this->message) < 10) {
                $this->addError('Please make your message a little bit longer, in order to send.');
            }
        }
    }

    private function addError($errorString) {
        array_push($this->errorMessages, $errorString);
    }

    private function sendFormData() {
        
        // uses FormSend to send mail
        if($formSend = FormSend::getInstance($this->validData)) {
            // mail good (keep going and save data)
            $this->saveFormData();

        } else {
            // mail bad
            echo json_encode([
                'status'=>'error',
                'message'=>'Unable to send info process at this time. Please try again later.'            	
            	]);
        }

    }

    private function saveFormData() {
        
        // uses FormSave to save info to db
        $formSave = FormSave::getInstance($this->validData);

    }

}