<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();      
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '20e794bd5ef51f';
        $mail->Password = 'a0abb4ae6c138b';

        $mail->setFrom('cuentas@appsal.com');
        $mail->addAddress('cuentas@appsal.com', 'Appsal.com');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre .  "</strong> Has creado tu cuenta en App Salón,
        para confirmar presiona en el siguiente enlace</p>";
        $contenido.= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>
        Confirmar cuenta</a> </p>";
        $contenido.= "<p>Si tu no solicitaste esta cuenta, puedes ignorar este mensaje</p>";
        $contenido.= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }

    public function enviarInstrucciones(){

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();      
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '20e794bd5ef51f';
        $mail->Password = 'a0abb4ae6c138b';

        $mail->setFrom('cuentas@appsal.com');
        $mail->addAddress('cuentas@appsal.com', 'Appsal.com');
        $mail->Subject = 'Reestablece tu password';

        //Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido.= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el
        siguiente enlace para hacerlo.</p>";
        $contenido.= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>
        Reestablecer password</a> </p>";
        $contenido.= "<p>Si tu no solicitaste este cambio, puedes ignorar este mensaje</p>";
        $contenido.= "</html>";

        $mail->Body = $contenido;

        $mail->send();
    }

}