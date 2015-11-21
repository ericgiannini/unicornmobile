<?php

if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "eric.giannini@fulbrightmail.org";

    $email_subject = "Inquiry into Unicorn Mobility";


    function died($error) {

        // your error code can go here

        echo "Did you fill out each of the fields?";

        echo "If not, then these may be the errors:<br /><br />";

        echo $error."<br /><br />";

        echo "Please fill out these fields!<br /><br />";

        die();

    }

    // validation expected data exists

    if(!isset($_POST['first_name']) ||

        !isset($_POST['last_name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['telephone']) ||

        !isset($_POST['questions'])) {

        died('Did you fill out each of the fields?');

    }

    $first_name = $_POST['first_name']; // required

    $last_name = $_POST['last_name']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $questions = $_POST['questions']; // required

    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'Your email address is malformed.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {

    $error_message .= 'Your first name is invalid.<br />';

  }

  if(!preg_match($string_exp,$last_name)) {

    $error_message .= 'Your last name is invalid.<br />';

  }

  if(strlen($questions) < 2) {

    $error_message .= 'Have asked a question longer than two characters?<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Please read these form details:.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";

    $email_message .= "Last Name: ".clean_string($last_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Questions: ".clean_string($questions)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>

<!-- include your own success html here -->

You have successfully submited your inquiry into Unicorn Mobility! I'll reply shortly!

<?php

}

?>
