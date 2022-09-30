<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    if(isset($_POST['formtype']) && ($_POST['formtype'] == "footer-enq")){
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

            // $headers = array_keys($data);

            $file = fopen($filename, 'a');
            //fputcsv($file, $headers ); //write headers (key of the $_POST array (id,username,password,etc)
            fputcsv($file, $data);
            fclose($file);
        }

            //   $to = 'manjeet.kumar@omlogic.com';
              $to = 'info@vandya.com';
              $cc = 'manjeet.kumar@omlogic.com';
              $subject = "New Enquiry";

              $message = "<p>Hello Admin,</p> <h3>We have received a new enquiry from the website. Below are the details.:</h3>
              Name: ".$_POST['name']."<br>
              Email: ".$_POST['email']."<br>
              Mobile No.: ".$_POST['phone']."<br>
              Message: ".$_POST['comment']."<br>
              Time & Date: ".date("H:i, d-m-Y")."<br>
              
              <br>
              <br>
              Thank You,<br>
              Team Vandya";

              $name = $_POST['name'];
              $email = $_POST['email'];

              require 'PHPMailer/PHPMailerAutoload.php';

              $adminMail = new PHPMailer;
              $adminMail->isSMTP();                                                    // Set mailer to use SMTP
              $adminMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
              $adminMail->SMTPAuth = true;                                             // Enable SMTP authentication
              $adminMail->Username = 'info@vandya.com';                     // SMTP username
              $adminMail->Password = 'Brio@1234';                                     // SMTP password
              $adminMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
              $adminMail->Port = 587;                                                  // TCP port to connect to
              $adminMail->addAddress($to);      // Add a recipient
              //$adminMail->addBCC($cc);      // Add a recipient
              $adminMail->AddReplyTo($email, $name);
              $adminMail->setfrom($email, $name);
              $adminMail->WordWrap = 50;                                               // Set word wrap to 50 characters
              $adminMail->isHTML(true);                                                // Set email format to HTML
              $adminMail->Subject = $subject;
              $adminMail->Body    = $message;

              if(!$adminMail->send()) {
                  echo json_encode(['status' => 'error', 'message' => 'Sorry, Message could not be sent...!']);
                  exit;
              } else {

                $subject = "Greeting from Vandana International School";
                $message = "<p>Hello ".$_POST['name'].",</p> 
                <br>
                <br>
                <p>Thank you for filling up the form. We will get back to you soon!</p>
                <br>
                <br>
                Thank You,<br>
                Team Vandya";

                $Mail = new PHPMailer;
                $Mail->isSMTP();                                                    // Set mailer to use SMTP
                $Mail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
                $Mail->SMTPAuth = true;                                             // Enable SMTP authentication
                $Mail->Username = 'info@vandya.com';                     // SMTP username
                $Mail->Password = 'Brio@1234';                                     // SMTP password
                $Mail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
                $Mail->Port = 587;                                                  // TCP port to connect to
                $Mail->addAddress($_POST['email']);      // Add a recipient
                $Mail->addBCC($cc);      // Add a recipient
                $Mail->AddReplyTo("info@vandya.com", "Team Vandya");
                $Mail->setfrom("info@vandya.com", "Team Vandya");
                $Mail->WordWrap = 50;                                               // Set word wrap to 50 characters
                $Mail->isHTML(true);                                                // Set email format to HTML
                $Mail->Subject = $subject;
                $Mail->Body    = $message;
                $Mail->send();
                  echo json_encode(['status' => 'success', 'message' => 'Thank you. We will get back to you soon!']);
                  exit;
              }

    }else if(isset($_POST['formtype']) && ($_POST['formtype'] == "join-us")){
        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // die;

        $filename ='join-us-leads.csv';

            
        if(isset($_FILES["resume"]["size"]) && $_FILES["resume"]["size"] > 0) {
            $temp = explode(".", $_FILES["resume"]["name"]);
            $resume = round(microtime(true)) . '.' . end($temp);
            $resume = "resumes/" . $resume;
            move_uploaded_file($_FILES["resume"]["tmp_name"], $resume);
            $resumeLink = $actual_link.'/'.$resume;
        }

        

        if(file_exists($filename)) {
            $data['date'] = date('d-m-Y h:i');
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['postappliedfor'] = $_POST['postappliedfor'];
            $data['resume'] = $resumeLink;

            $file = fopen($filename, 'a');
            fputcsv($file, $data);
            fclose($file);
        }

            //   $to = 'manjeet.kumar@omlogic.com';
            $to = 'info@vandya.com';
            $cc = 'manjeet.kumar@omlogic.com';
            $subject = "Job Enquiry";

              $message = "<p>Hello Admin,</p> <h3>We have received a Job Enquiry from the website. Below are the details.:</h3>
              Name: ".$_POST['name']."<br>
              Email: ".$_POST['email']."<br>
              Mobile No.: ".$_POST['phone']."<br>
              Post Applied For: ".$_POST['postappliedfor']."<br>
              Resume: <a href='".$resumeLink."'>Click here to download</a><br>
              Time & Date: ".date("H:i, d-m-Y")."<br>
              
              <br>
              <br>
              Thank You,<br>
              Team Vandya";

              $name = $_POST['name'];
              $email = $_POST['email'];

              require 'PHPMailer/PHPMailerAutoload.php';

              $adminMail = new PHPMailer;
              $adminMail->isSMTP();                                                    // Set mailer to use SMTP
              $adminMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
              $adminMail->SMTPAuth = true;                                             // Enable SMTP authentication
              $adminMail->Username = 'info@vandya.com';                     // SMTP username
              $adminMail->Password = 'Brio@1234';                                     // SMTP password
              $adminMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
              $adminMail->Port = 587;                                                  // TCP port to connect to
              $adminMail->addAddress($to);      // Add a recipient
              $adminMail->addBCC($cc);      // Add a recipient
              $adminMail->AddReplyTo($email, $name);
              $adminMail->setfrom($email, $name);
              $adminMail->WordWrap = 50;                                               // Set word wrap to 50 characters
              $adminMail->isHTML(true);                                                // Set email format to HTML
              $adminMail->Subject = $subject;
              $adminMail->Body    = $message;

              if(!$adminMail->send()) {
                  header("Location: http://192.168.1.34/design/vandya/ver5/open-days.php");
                  exit;
              } else {
                $subject = "Greeting from Vandana International School";
                $message = "<p>Hello ".$_POST['name'].",</p> 
                <br>
                <br>
                <p>Thank you for filling up the Job Enquiry form. We will get back to you soon!</p>
                <br>
                <br>
                Thank You,<br>
                Team Vandya";

                $Mail = new PHPMailer;
                $Mail->isSMTP();                                                    // Set mailer to use SMTP
                $Mail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
                $Mail->SMTPAuth = true;                                             // Enable SMTP authentication
                $Mail->Username = 'info@vandya.com';                     // SMTP username
                $Mail->Password = 'Brio@1234';                                     // SMTP password
                $Mail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
                $Mail->Port = 587;                                                  // TCP port to connect to
                $Mail->addAddress($_POST['email']);      // Add a recipient
                //$Mail->addBCC($cc);      // Add a recipient
                $Mail->AddReplyTo("info@vandya.com", "Team Vandya");
                $Mail->setfrom("info@vandya.com", "Team Vandya");
                $Mail->WordWrap = 50;                                               // Set word wrap to 50 characters
                $Mail->isHTML(true);                                                // Set email format to HTML
                $Mail->Subject = $subject;
                $Mail->Body    = $message;
                $Mail->send();
                header("Location: http://192.168.1.34/design/vandya/ver5/open-days.php");
                  exit;
              }

    }else if(isset($_POST['formtype']) && ($_POST['formtype'] == "open-days")){
        // echo "<pre>";
        // print_r($_POST);
        // die;

        $filename ='open-days-leads.csv';

        if(file_exists($filename)) {
            $data['date'] = date('d-m-Y h:i');
            $data['sname'] = $_POST['sname'];
            $data['sage'] = $_POST['sage'];
            $data['grade'] = $_POST['grade'];
            $data['parentname'] = $_POST['parentname'];
            $data['parentphone'] = $_POST['parentphone'];
            $data['pemailid'] = $_POST['pemailid'];
            $data['dov'] = $_POST['dov'];
            $data['query'] = $_POST['query'];
            
            $file = fopen($filename, 'a');
            fputcsv($file, $data);
            fclose($file);
        }

            //   $to = 'manjeet.kumar@omlogic.com';
            $to = 'info@vandya.com';
            $cc = 'manjeet.kumar@omlogic.com';
            $subject = "Campus Tour Registation";

              $message = "<p>Hello Admin,</p> <h3>We have received a Campus Tour Registation from the website. Below are the details.:</h3>
              Student Name: ".$_POST['sname']."<br>
              Student Age: ".$_POST['sage']."<br>
              Admission Sought to Grade: ".$_POST['grade']."<br>
              Parent Name: ".$_POST['parentname']."<br>
              Parent Phone: ".$_POST['parentphone']."<br>
              Parent Email Id: ".$_POST['pemailid']."<br>
              Date of Visit: ".$_POST['dov']."<br>
              Query: ".$_POST['query']."<br>
              Time & Date: ".date("H:i, d-m-Y")."<br>
              
              <br>
              <br>
              Thank You,<br>
              Team Vandya";

              $name = $_POST['sname'];
              $email = $_POST['pemailid'];

              require 'PHPMailer/PHPMailerAutoload.php';

              $adminMail = new PHPMailer;
              $adminMail->isSMTP();                                                    // Set mailer to use SMTP
              $adminMail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
              $adminMail->SMTPAuth = true;                                             // Enable SMTP authentication
              $adminMail->Username = 'info@vandya.com';                     // SMTP username
              $adminMail->Password = 'Brio@1234';                                     // SMTP password
              $adminMail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
              $adminMail->Port = 587;                                                  // TCP port to connect to
              $adminMail->addAddress($to);      // Add a recipient
              $adminMail->addBCC($cc);      // Add a recipient
              $adminMail->AddReplyTo($email, $name);
              $adminMail->setfrom($email, $name);
              $adminMail->WordWrap = 50;                                               // Set word wrap to 50 characters
              $adminMail->isHTML(true);                                                // Set email format to HTML
              $adminMail->Subject = $subject;
              $adminMail->Body    = $message;

              if(!$adminMail->send()) {
                  header("Location: http://192.168.1.34/design/vandya/ver5/open-days.php");
                  exit;
              } else {
                $subject = "Greeting from Vandana International School";
                $message = "<p>Hello ".$name.",</p> 
                <br>
                <br>
                <p>Thank you for filling up the Campus Tour Registation form. We will get back to you soon!</p>
                <br>
                <br>
                Thank You,<br>
                Team Vandya";

                $Mail = new PHPMailer;
                $Mail->isSMTP();                                                    // Set mailer to use SMTP
                $Mail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
                $Mail->SMTPAuth = true;                                             // Enable SMTP authentication
                $Mail->Username = 'info@vandya.com';                     // SMTP username
                $Mail->Password = 'Brio@1234';                                     // SMTP password
                $Mail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
                $Mail->Port = 587;                                                  // TCP port to connect to
                $Mail->addAddress($email);      // Add a recipient
                //$Mail->addBCC($cc);      // Add a recipient
                $Mail->AddReplyTo("info@vandya.com", "Team Vandya");
                $Mail->setfrom("info@vandya.com", "Team Vandya");
                $Mail->WordWrap = 50;                                               // Set word wrap to 50 characters
                $Mail->isHTML(true);                                                // Set email format to HTML
                $Mail->Subject = $subject;
                $Mail->Body    = $message;
                $Mail->send();
                header("Location: http://192.168.1.34/design/vandya/ver5/open-days.php");
                  exit;
              }

    }
     else {
        die('Invalid attempt');
    }

    exit;
?>