<?php require_once 'include/header.php'; ?>
<?php require_once 'include/navigation.php'; ?>
<?php require_once 'include/databaseobj.inc'; ?>

<?php
$objDatabase = new DatabaseObj;
$db = $objDatabase->Open();
$query = "Select * from events;";
$result = $db->query($query);
?>
<div class='row'>
    <div class='col-md-1'>
    </div>
    <div class='col-xs-12 col-md-3'>
        <div class='thumbnail'>
            <img src='img/49-Comet.png' alt='...'>
            <div class='caption'>
                <h3>Event Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at dui eget ante sollicitudin posuere. </p>
                <p><a href='#' class='btn btn-primary' role='button'>Details</a></p>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-md-3'>
        <div class='thumbnail'>
            <img src='img/49-Comet.png' alt='...'>
            <div class='caption'>
                <h3>Event Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at dui eget ante sollicitudin posuere. </p>
                <p><a href='#' class='btn btn-primary' role='button'>Details</a></p>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-md-3'>
        <div class='thumbnail'>
            <img src='img/49-Comet.png' alt='...'>
            <div class='caption'>
                <h3>Event Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at dui eget ante sollicitudin posuere. </p>
                <p><a href='#' class='btn btn-primary' role='button'>Details</a></p>
            </div>
        </div>
    </div>

    
</div>
<div class='row'>
    <div class='col-lg-6'>
        <div class='input-group'>
            <div class='input-group-btn'>
                <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action <span class='caret'></span></button>
                <ul class='dropdown-menu'>
                    <li><a href='#'>Action</a></li>
                    <li><a href='#'>Another action</a></li>
                    <li><a href='#'>Something else here</a></li>
                    <li role='separator' class='divider'></li>
                    <li><a href='#'>Separated link</a></li>
                </ul>
            </div><!-- /btn-group -->
            <input type='text' class='form-control' aria-label='...'>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<?php
/*
  require_once 'phpmailer/PHPMailerAutoload.php';
  require_once('phpmailer/class.phpmailer.php');

  $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

  $mail->IsSMTP(); // telling the class to use SMTP

  try {
  $mail->Host = 'mail.hongj5.cs.spu.edu'; // server
  $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth = true;                  // enable SMTP authentication
  $mail->SMTPSecure = 'tls';                 // sets the prefix to the servier
  $mail->Host = 'smtp.gmail.com';      // sets GMAIL as the SMTP server
  $mail->Port = 587;                   // set the SMTP port for the GMAIL server
  $mail->Username = 'aspustocksemail@gmail.com';
  $mail->Password = 'spustocks2016';
  $mail->AddAddress('hongj5@spu.edu', 'Jimmy H');
  $mail->SetFrom('aspustocksemail@gmail.com', 'jhQuotes');
  $mail->Subject = 'jhQuotes Email Confirmation';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $message='Hello';
  $mail->MsgHTML($message);
  $mail->Send();
  echo 'Message Sent OK<p></p>\n';
  } catch (phpmailerException $e) {
  //echo $e->errorMessage(); //Error messages from PHPMailer
  } catch (Exception $e) {
  //echo $e->getMessage(); //Error messages from anything else
  } */
?>
</div>