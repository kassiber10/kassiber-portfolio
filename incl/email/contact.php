  <?php

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
    if (array_key_exists('firstname', $_POST['contactdata'])) {
      $firstname = substr(strip_tags($_POST['contactdata']['firstname']), 0, 255);
    } else {
      $firstname = '';
    }
    if (array_key_exists('lastname', $_POST['contactdata'])) {
      //Limit length and strip HTML tags
      $lastname = substr(strip_tags($_POST['contactdata']['lastname']), 0, 255);
    } else {
      $lastname = '';
    }

    if (array_key_exists('email', $_POST['contactdata']) && PHPMailer::validateAddress($_POST['contactdata']['email'])) {
      filter_var($_POST['contactdata']['email'], FILTER_SANITIZE_EMAIL);
      $email = $_POST['contactdata']['email'];
    } else {
      $msg->emailError = "Bitte geben Sie eine valide E-Mail Adresse an.";
      $response = json_encode($msg);
      echo $response;
      $err = true;
    }
    //Apply some basic validation and filtering to the subject
    if (array_key_exists('subject', $_POST['contactdata'])) {
      $subject = substr(strip_tags($_POST['contactdata']['subject']), 0, 255);
    } else {
      $subject = 'Bitte geben Sie einen Betreff an';
    }
    //Apply some basic validation and filtering to the query
    if (array_key_exists('message', $_POST['contactdata'])) {
      //Limit length and strip HTML tags
      $message = substr(strip_tags($_POST['contactdata']['message']), 0, 16384);
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
      $mail->Username = 'contact@22pictures.at';
      $mail->Password = 'IIKDovL9E=';
      $mail->SMTPSecure = 'tls';
      $mail->CharSet = PHPMailer::CHARSET_UTF8;
      $mail->setFrom('contact@22pictures.at', (empty($lastname) ? 'Anfrage von:' : $firstname));
      $mail->addAddress('contact@22pictures.at');
      $mail->addReplyTo($email, $firstname . " " . $lastname);
      $mail->Subject = 'Betreff: ' . $subject;
      $mail->Body = "Anfrage von Kontaktformular\n\n" . $message;

      try {
        $mail->send();
        $msg->emailSentSucess = "Vielen Dank! Ihre E-Mail wurde erfolgreich versandt\n" . "Wir werden Ihre Anfrage sobald als möglich bearbeiten.";
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
