<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

    if($_POST) {
        // echo "<pre>";
        // print_r($_POST);
        // die;

        $filename ='Enquiry-Report.csv';

        if(file_exists($filename)) {
            $data['date'] = date('d-m-Y h:i');
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['comment'] = $_POST['comment'];

            $headers = array_keys($data);

            $file = fopen($filename, 'a');
            //fputcsv($file, $headers ); //write headers (key of the $_POST array (id,username,password,etc)
            fputcsv($file, $data);
            fclose($file);
        }

            //   $to = 'pankaj.kumar@omlogic.co.in';
              $to = 'info@vandya.com';
            //   $cc = 'sumit@omlogic.com';
              $subject = "New Enquiry";

              $message = "<p>Hello Admin,</p> <h3>We have received a new enquiry from the website. Below are the details.:</h3>
              Name: ".$_POST['name']."<br>
              Email: ".$_POST['email']."<br>
              Mobile No.: ".$_POST['phone']."<br>
              Comment: ".$_POST['comment']."<br>
              
              <br>
              <br>
              Thank You,<br>
              Team Vandya";

              $name = $_POST['name'];
              $email = $_POST['email'];

            //   require 'PHPMailer/PHPMailerAutoload.php';

            //   $adminMail = new PHPMailer;
            //   $adminMail->isSMTP();                                                    // Set mailer to use SMTP
            //   $adminMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
            //   $adminMail->SMTPAuth = true;                                             // Enable SMTP authentication
            //   $adminMail->Username = 'info@vandya.com';                     // SMTP username
            //   $adminMail->Password = 'Brio@1234';                                     // SMTP password
            //   $adminMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
            //   $adminMail->Port = 587;                                                  // TCP port to connect to
            //   $adminMail->addAddress($to);      // Add a recipient
            //   //$adminMail->addBCC($cc);      // Add a recipient
            //   $adminMail->AddReplyTo($email, $name);
            //   $adminMail->setfrom($email, $name);
            //   $adminMail->WordWrap = 50;                                               // Set word wrap to 50 characters
            //   $adminMail->isHTML(true);                                                // Set email format to HTML
            //   $adminMail->Subject = $subject;
            //   $adminMail->Body    = $message;

            //   if(!$adminMail->send()) {
            //       echo json_encode(['status' => 'error', 'message' => 'Sorry, Message could not be sent...!']);
            //       exit;
            //   } else {
            //       echo json_encode(['status' => 'success', 'message' => 'Thank you. We will get back to you soon!']);
            //       exit;
            //   }

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$email . "\r\n";
            // $headers .= 'Cc: sales@example.com' . "\r\n";

            if(mail($to,$subject,$message, $headers)) {
                echo json_encode(['status' => 'success', 'message' => 'Thank you. We will get back to you soon!']);
                exit;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sorry, Message could not be sent...!']);
                exit;
            }

    } else {
        die('Invalid attempt');
    }

    exit;
?>