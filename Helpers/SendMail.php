<?php
/**
 * Created by PhpStorm
 * Author: Kha Nam
 * Date: 18/09/2020
 * Time: 1:50 PM
 **/

require_once "./plugins/PHPMailer/src/PHPMailer.php";
require_once "./plugins/PHPMailer/src/Exception.php";
require_once "./plugins/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    private $mail;
    private $subject;
    private $body;
    private $receiver;

    public function __construct($subject, $body, $receiver)
    {
        $this->mail = new PHPMailer(true);
        $this->subject = $subject;
        $this->body = $body;
        $this->receiver = $receiver;
    }

    public function handle()
    {
        try {
//           SMTP Setting
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'khanamdev@gmail.com';
            $this->mail->Password = 'fiipjvetainhruew';
            $this->mail->Port = 465;
            $this->mail->SMTPSecure = 'ssl';
            $this->mail->CharSet = "UTF-8";
            $this->mail->SMTPDebug = 0;

//          Email Setting
            $this->mail->setFrom('khanamdev@gmail.com', 'Vans Việt Nam');
            $this->mail->addAddress($this->receiver);
            $this->mail->Subject = $this->subject;
            $this->mail->Body = $this->body;
            $this->mail->AltBody = $this->body;
            $this->mail->addReplyTo('khanamdev@gmail.com');
            $this->mail->send();
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

    }

}