<?php require_once 'include/header.php'; ?>
<?php require_once 'include/navigation.php'; ?>
<?php require_once 'include/databaseobj.inc'; ?>

<div class="jumbotron">
  <h1>EVENTS</h1>
</div>
<div class="middle">
  <div class="container">
    <!-- 
    Use this when there are no events planned. 
    <h2>Upcoming Events</h2>
    <div class="well">
      <p>No events are currently planned at this time.
      </p>
    </div>
    <!-- a -->
    <div class="events-thumbnails"
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="thumbnail">
            <img class="event-image" src="img/38-Autumn.png" alt="autumn">
            <div class="caption">
                <h3 class="eventpage-name">Hackathon</h3>
                <p>Sat Mar, 4 2017</p>
                <p>10:30 AM - 7:30 PM</p>
                <p><a href="events.php" class="btn btn-primary" role="button">Details</a></p>
                <p>col-xs-12 Values range from 1-12 12 being the width of the container. (mobile)
                    col-sm-12 Values range from 1-12. Same concept but for smaller devices. (tablets)
                    col-md-12 Values range from 1-12 again. Same concept but for desktop. (desktop)</p>
            </div>
        </div>
    </div>
  </div>
</div>
<?php

# Use this once we get the database set up on the server
/*
// Delete events older than 7 days
$objDatabase = new DatabaseObj;
$db = $objDatabase->Open();
$query = "SELECT * FROM events WHERE event_date < DATE_SUB(NOW(), INTERVAL 7 DAY);";
$result = $db->query($query);
if (!empty($result = $db->query($query)))
{
    while($row = $result->fetch_assoc()) // Get event data array
    {   
        extract($row);
        echo $event_name;
        $query = "DELETE FROM events WHERE event_name=\"{$event_name}\" AND description=\"{$description}\"";
        $db->query($query); // Delete older than 7 days items
    }
}

if (isset($_GET['e']))
{
    // Show event details here
    // If it has but hasn't gone past a week still display details without Join button but "Went" button
    $event = filter_input(INPUT_GET, 'e');
    $query = "SELECT * FROM Events WHERE event_name=\"{$event}\";";
    $result = $db->query($query);
    // Formatting Event NEEDS TO BE DONE STILL
    if($result->num_rows) // Not a static query so we use num_rows to check if there is content
    {
        $row = $result->fetch_assoc();
        extract($row);
        
        $dbDate = strtotime($event_date);
        $date = date("D M, j Y", $dbDate); // Format date
        $dbTime = strtotime($event_time);
        $time = date('g:i A', $dbTime); // Format time
        print "<div class = 'jumbotron'>";
            print "<h1>{$event_name}</h1>";
        print "</div>";
        //print "<img class = 'event-image' src = '{$image_link}' alt = '...'>";
        print "<div class = 'caption'>";
            print "<h3>{$event_name}</h3>";
            print "<p>{$description}</p>";
            print "<p>{$date}</p>";
            print "<p>{$time}</p>";
            print "<p>Join Button Here</p>";
        print "</div>";
    }
    else
    {
        print "<div class = 'jumbotron'>";
            print "<h1>This event is invalid.</h1>";
            print "<p>Request one below if you have an idea for an event!</p>";
        print "</div>";
    }
    $objDatabase->Close();
}
else
{
    $query = "Select * from events;";
    
    // Check if query went through successfully
    // If it didn't it wouldn't go through but this is a static query that we expect to go through
    if (!empty($result = $db->query($query)))
    {
        $totalEvents = $result->num_rows;

        // If no events are scheduled request ideas
        if ($totalEvents == 0)
        {
            print "<div class = 'jumbotron'>
                    <h1>Currently no events are scheduled.</h1>
                    <p>Request one below if you have an idea for an event!</p>
                    </div>";
        }
        else
        {
            //Do math for figuring out the grid column # for the events
            if ($totalEvents >= 4)
            {
                $columnNumber = 3;
            } 
            else
            {
                $columnNumber = round(10 / $totalEvents, 0, PHP_ROUND_HALF_DOWN); // Either 10, 5 or 3
            }
            //Create the grid for the events. col-md-1 spaces it so it's more centered.
            print "<div class='middle'>";
            print "<div class='container'>";
            print "<div class = 'events-box'>";
            print "<div class = 'row margintop15'>";
            print "<div class = 'col-sm-1 col-md-1'>";
            print "</div>";
            $i = 0;
            while ($row = $result->fetch_assoc())
            {
                extract($row);
                
                $dbDate = strtotime($event_date);
                $date = date("D M, j Y", $dbDate); // Format date
                $dbTime = strtotime($event_time);
                $time = date('g:i A', $dbTime); // Format time
                
                if ($i == 3) // Maximum 3 events per row
                {
                    //Start a new row with same format
                    print "</div><!--row-->";
                    print "<div class = 'row'>";
                    print "<div class ='col-sm-1 col-md-1'>";
                    print "</div>";
                    $i = 0;
                }
                print "<div class = 'col-xs-12 col-sm-{$columnNumber} col-md-{$columnNumber}'>";
                print "<div class = 'thumbnail'>";
                print "<img class = 'event-image' src = '{$image_link}' alt = '...'>";
                print "<div class = 'caption'>";
                print "<h3 class='eventpage-name'>{$event_name}</h3>";
                print "<p>{$date}</p>";
                print "<p>{$time}</p>";
                print "<p><a href = 'events.php?e={$event_name}' class = 'btn btn-primary' role = 'button'>Details</a></p>";
                print "</div>";
                print "</div>";
                print "</div>";
                $i = $i + 1;
            }
            print "</div><!--row-->";
            print "</div><!--events-->";
        }



        print "<div class = 'row'>";
            print "<div class='col-sm-1 col-md-1'>";
            print "</div>";
        print "<div class = 'eventpage-emailrequest col-xs-10 col-sm-9 col-md-9'>";
        print "<div class = 'input-group'>";
        print "<div class = 'input-group-btn'>";
        print "<button type = 'button' class = 'btn btn-default dropdown-toggle' data-toggle = 'dropdown' aria-haspopup = 'true' aria-expanded = 'false'>Action <span class = 'caret'></span></button>";
        print "<ul class = 'dropdown-menu'>";
        print "<li><a href = '#'>Action</a></li>";
        print "<li><a href = '#'>Another action</a></li>";
        print "<li><a href = '#'>Something else here</a></li>";
        print "<li role = 'separator' class = 'divider'></li>";
        print "<li><a href = '#'>Separated link</a></li>";
        print "</ul>";
        print "</div><!--/btn-group -->";
        print "<input type = 'text' class = 'form-control' aria-label = '...'>";
        print "</div><!--/input-group -->";
        print "</div><!--/.col-lg-6 -->";
        print "</div><!--/.row -->";
        print "</div><!--/.container -->";
        print "</div><!--/.middle -->";
        
        $objDatabase->Close();
    }
}
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