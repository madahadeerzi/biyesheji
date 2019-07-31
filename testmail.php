<?php
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

//$mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.163.com';                          // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'madahadeerzi@163.com';                        // SMTP username
$mail->Password = 'qweasd123';                 // SMTP password otozudkjbpvybjfg
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('madahadeerzi@163.com', 'HuangSzeKit');
$mail->addAddress('501765470@qq.com', 'huangsijie');  // Add a recipient

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'PHPMailer发送邮件的示例';
$mail->Body    = '这是我用PHPMailer发来的消息，不可以';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>