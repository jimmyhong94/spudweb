<?php require_once 'include/header.php'; ?>
<?php require_once 'include/navigation.php'; ?>
<?php require_once 'include/databaseobj.inc'; ?>

<?php
$objDatabase = new DatabaseObj;
$db = $objDatabase->Open();
$query = "Select * from events;";
$result = $db->query($query);

if($result)
{
        $totalEvents = $result->num_rows;

        if($totalEvents == 0)
        {
            print "<div class='center'><h4>There are currently no scheduled events. Request one below!</h4></div>";
        }
        else
        {
            //Do math for figuring out the grid column # for the events
            if($totalEvents >= 4)
            {
                $columnNumber = 3;
            }
            else
            {
                $columnNumber = round(10 / $totalEvents, 0, PHP_ROUND_HALF_DOWN); // Either 11, 5 or 3
            }
            //Create the grid for the events. col-md-1 spaces it so it's more centered.
  
            print "<div class='events'>
                   <div class='row margintop15'>
                   <div class='col-sm-1 col-md-1'>
                   </div>";
            $i = 0;
            while($row = $result->fetch_assoc())
            {
                extract($row);
                if($i == 3) // Maximum 3 events per row
                {
                    //Start a new row with same format
                    print "</div><!--row-->
                           <div class='row'>
                           <div class='col-sm-1 col-md-1'>
                           </div>";
                    $i = 0;
                }
                print "<div class='col-xs-11 col-sm-{$columnNumber} col-md-{$columnNumber}'>
                    <div class='thumbnail'>
                        <img class='event-image' src='{$image_link}' alt='...'>
                        <div class='caption'>
                            <h3>{$event_name}</h3>
                            <p>{$description}</p>
                            <p>{$event_date}</p>
                            <p>{$event_time}</p>
                            <p><a href='#' class='btn btn-primary' role='button'>Details</a></p>
                        </div>
                    </div>
                </div>";
                $i = $i + 1;
            }
            print "</div><!--row-->
                   </div><!--events-->";
        }
}

print "<div class='row'>
    <div class='col-lg-10'>
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
</div><!-- /.row -->";

/*
<?php
/* phpmailer example
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