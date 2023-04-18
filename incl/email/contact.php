  <?php
  header('Access-Control-Allow-Origin: http://localhost:5173', false);


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require './vendor/phpmailer/phpmailer/src/SMTP.php';
  require './vendor/phpmailer/phpmailer/src/Exception.php';


  $msg = new \stdClass();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $err = false;

    $email = '';
    //Apply some basic validation and filtering to the name
    if (array_key_exists('name', $_POST)) {
      $name = substr(strip_tags($_POST['name']), 0, 255);
    } else {
      $name = '';
    }


    if (array_key_exists('email', $_POST) && PHPMailer::validateAddress($_POST['email'])) {
      filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $email = $_POST['email'];
    } else {
      $msg->emailError = "Bitte geben Sie eine valide E-Mail Adresse an.";
      $response = json_encode($msg);
      echo $response;
      $err = true;
    }
   
    if (array_key_exists('text', $_POST)) {
      //Limit length and strip HTML tags
      $message = substr(strip_tags($_POST['text']), 0, 16384);
    } else {
      $message = '';
      $msg = 'Bitte geben Sie eine Nachricht ein';
      $err = true;
    }

    if (!$err) {
      $mail = new PHPMailer();
      $mail->isSMTP();
      //$mail->SMTPDebug = 2;
      $mail->Host = 'smtp.world4you.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->Username = 'alex@doomdubberz.com';
      $mail->Password = 'vodo6NvQ4*';
      $mail->SMTPSecure = 'tls';
      $mail->CharSet = PHPMailer::CHARSET_UTF8;
      $mail->setFrom('alex@doomdubberz.com', $name);
      $mail->addAddress('alex@doomdubberz.com');
      $mail->addReplyTo($email, $name);
      $mail->Subject = 'Betreff: Portfolio Kontaktformular';
      $mail->Body = $message;

      try {
        $mail->send();
        $msg->emailSentSuccess = "Vielen Dank! Ihre E-Mail wurde erfolgreich versandt\n" . "Wir werden Ihre Anfrage sobald als möglich bearbeiten.";
        $response = json_encode($msg);
        echo $response;
      } catch (Exception $e) {
        $msg->emailError = "Der Versand der E-Mail ist fehlgeschlagen. Bitte versuchen Sie es später erneut.";
        $response = json_encode($msg);
        echo $response;
      }
    }
  } else {
    $msg->emailError = "Der Versand der E-Mail ist fehlgeschlagen.\n" . "Bitte versuchen Sie das Kontaktformular erneut zu versenden.";
    $response = json_encode($msg);
    echo $response;
  }
