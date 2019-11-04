<?php

namespace WEO3;

require "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Takes validated data and sends, using PHPMailer
 * Awaits for and returns response
 */

class FormSend {

    private static $instance = null;
    private $validData = [];

    private $mailer;


    private function __construct($data) {

        //echo "sweet: " . implode("<br>", $validData);
        $this->validData = $data;
        $this->mailer = new PHPMailer(true);
        $this->sendContent();
    }

    public static function getInstance($data) {
        if(!self::$instance) {
            self::$instance = new FormSend($data);
        }

        return self::$instance;
    }

    private function composeHTMLContent() {
        $htmlContent = "<h3>Contact Form Submission Information</h3><br/>";

        $htmlContent .= "<strong>From:</strong> ".$this->validData['name']."<br/><br/>";
        $htmlContent .= "<strong>Email:</strong> ".$this->validData['email']."<br/><br/>";
        $htmlContent .= "<strong>Message:</strong><br/>".$this->validData['message'];

        return $htmlContent;
    }

    private function composePlaintextContent() {
        $plaintextContent = "Contact Form Submission Information\n\n";
        foreach($this->validData as &$val) {
            $plaintextContent .= "{$val} \n";
        }
        
        return $plaintextContent;
    }

    private function sendContent() {

        try {

            $this->mailer->setFrom('contact@info.com', 'Mister Contact Form');
            $this->mailer->addAddress('guy-smiley@example.com', 'Guy Smiley');
            $this->mailer->Subject = 'Hello from '.$this->validData['name'].'!';
            $this->mailer->isHTML(true);
            $this->mailer->Body = $this->composeHTMLContent();
            $this->mailer->AltBody = $this->composePlaintextContent();
            
            $this->mailer->send();
            return true;

        } catch(Exception $e) {

            return false;

        }

    }

}