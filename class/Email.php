<?php

namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct( $email, $nombre, $token ) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'dfcf769cf6461d';
        $mail->Password = 'c102f4c927d666';

        $mail->setFrom('doctores@farmacia.com');
        $mail->addAddress('doctores@farmacia.com', 'Farmacia.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTMl
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong>Has creado tu cuenta,solo debes confirmarla creando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        
        // Enviar el email
        $mail->send();
    }
}