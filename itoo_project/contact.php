<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        @font-face {
            font-family:"Maveric" ;
            src: url("../font/maveric-regular.woff");
        }
        @font-face {
    font-family: "PowerGrotesk";
    src: url("../font/PowerGrotesk-Regular.woff");
 }
    </style>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 



//Load Composer's autoloader
require 'php_mailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$name = $_POST['nom'] ; 
$prenom = $_POST['prenom'] ; 

$email = $_POST['email']; 
$tele = $_POST['telephone']; 
$message = $_POST['message']; 



try {
    $mail = new PHPMailer(true);
    
    //Server settings                   
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    
    $mail->Username   = 'abdooukarri@gmail.com';                    
    $mail->Password   = 'ggatjdzfstbjjbeb';
    $mail->SMTPSecure = "TLS";            
    $mail->Port= 587;                                    

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer'); 
    $mail->addAddress('abdooukarri@gmail.com', 'Ossama Eleven');  //RECIVED
    $message =  "
                <div style='font-size:30px;font-family:PowerGrotesk;font-weight:600; font-style:italic ; margin:0 auto ; width:100px; '><img src='https://elevenmedia.ma/uploads/config/images/5dca8dd5d175b.png' alt='image'/> </div>
                       <div class='row container-fluid justify-content-center ' style='margin: 0 auto ; min-width:100px;  color:aqua;line-height: 35px; '>
    
                                <div class='col-4' style='background-color: #7575c1; color:#fff ;  font-family: Maveric;  ;font-size: 30px; '>Nom</div>
                                <div class='col-4 ' style='color:black;font-size:20px '>$name</div>
    
                                <div class='col-4' class='col-6' style='background-color: #7575c1; color:#fff ; font-family: Maveric; font-size: 30px;'>Prenom</div>
                                <div class='col-4 'style=' color:black;font-size:20px' >$prenom</div>
    
                              
                                <div class='col-4' class='col-6' style='background-color: #7575c1; color:#fff ; font-family: Maveric; font-size: 30px;'>Tele</div>
                                <div class='col-4 'style='color:black;font-size:20px' >$tele</div>
                                
                                <div class='col-4' class='col-6' style='background-color: #7575c1; color:#fff ; font-family: Maveric; font-size: 30px;'>Message</div>
                                <div class='col-4'style='color:black;font-size:20px'>$message</div>
                        </div>
            </div> "; 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Apply  Order';
    $mail->Body    = $message ;
    // 
    // $mail->addAttachment('assets//image.jpg', 'new.jpg');    //Optional name

    if(!$mail->send()){
        $error = "Mailer error" . $mail->ErrorInfo; 
        
      echo  "<script>
        alert('message not sent');
        document.location.href='contact.html'; 

        </script>" ;
    }
    else{
    echo "
        <script>
            alert(' message sent');
            document.location.href='contact.html'; 

        </script>"
          ;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>