<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        //Crear objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8f33af5854a61e';
        $mail->Password = 'c3f5a700a891b2';

        $mail->setFrom('cuentas@dondepelotear.com');
        $mail->addAddress('cuentas@dondepelotear.com', 'dondepelotear.com');
        $mail->Subject = 'Confirma tu cuenta';
        //set HTML 
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> has creado tu cuenta en DondePelotear.com, confirma presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta ignorala</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        //Crear objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8f33af5854a61e';
        $mail->Password = 'c3f5a700a891b2';

        $mail->setFrom('cuentas@dondepelotear.com');
        $mail->addAddress('cuentas@dondepelotear.com', 'dondepelotear.com');
        $mail->Subject = 'Restablece tu password';
        //set HTML 
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>Has solicitado restablecer tu password sigue el enlace para hacerlo</p>";
        $contenido .= "<p>Presiona aqui <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer password </a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta ignorala</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->send();
    }
}
