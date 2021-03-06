<?php

use PHPMailer\PHPMailer\PHPMailer;

require('vendor/autoload.php'); //autoload.php');


$mail = new PHPMailer();
// smtp config

$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'xxxxxx';  //paste one generated by Mailtrap
$mail->Password = 'xxxxxx';  //paste one generated by Mailtrap
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

/*** headers
 * 
 */
$mail->setFrom('info@mailtrap.io', 'Mailtrap');
$mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
// send to 
$mail->addAddress('recipient1@mailtrap.io', 'Tim');

/*** to add several TO addresses
 *  $mail->AddBCC('bcc2@example.com', 'Anna');
    $mail->AddBCC('bcc3@example.com', 'Mark');
 */

$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
$mail->isHTML(true);

// mail content


if (!empty($_POST['bookingId'])) {
    //! connect to database
    include_once("db.php");

    $id = $_POST['bookingId'];
    // ! email body
    $mail->Body = parse_template("./email_template01.html", $id);
    //! send the email
    if ($mail->send()) {
        echo "Message has been sent";
    } else {
        echo "Message not sent. <br>";
        echo "Mailer error: $mail->ErrorInfo";
    }
} else {
    //post set check
    // echo anchor('../', 'back', '');
?>
<!DOCTYPE html>
<html>
   <body>
      <script>
         setTimeout(function(){
            window.location.href = 'http://localhost:800';
         }, 3000);
      </script>
      <p>Going back after 3 seconds.</p>
   </body>
</html>

    <?php


    die("\$_POST not set");
}

/*** 
 *	@filename 	= template file such as ./template.html
 *	@id		= record to prep the email for  
 *  @return mixed //echo and return result.
 */
function parse_template($filename, $id)
{
    //db connection
    $link = db_connect('amandiko_bookings');
    if ($link) {
        # code...


        $fields = " b.id as `reservation`, 
                CONCAT(first_name, ' ', last_name) as `customer`, b.phone,
                b.email,	
                b.pu_date,
                b.pu_time,
                b.pax_adult,
                b.pax_child,b.status, 
                concat(l.name_short,' - ',l.`name_long`) as pu_loc,
                concat(d.name_short,' - ',d.`name_long`) as drop_loc
                    FROM bookings b
                left join locations l on
                    b.pu_loc = l.id
                left join locations d on
                    b.drop_loc = d.id";


        $query = "select $fields WHERE b.id=$id";
        // echo $query;
        // print_r($link);
        $res = $link->query($query);


        while ($row = $res->fetch_assoc()) {
            $data =   array(
                "customer" => $row['customer'],
                "reservation" => $row['reservation'],
                "phone" => $row['phone'],
                "email" => $row['email'],
                "pu_date" => niceDate($row['pu_date']),
                "pu_time" => niceTime($row['pu_time']),
                "pu_loc" => $row['pu_loc'],
                "drop_loc" => $row['drop_loc'],
                "adults" => $row['pax_adult'],
                "children" => $row['pax_child'],
                "status" => $row['status']
            );
        }
        $fileContents = file_get_contents($filename);
        foreach ($data as $key => $value) {
            //replace curly braces and field name with value from recordset
            $fileContents = str_replace('{' . $key . '}', $value, $fileContents);
        }
        echo $fileContents;
    }  //check $link connection
    return $fileContents;
}


// convert to a readable date string. eg.: Jun 05 2011
function niceDate($str)
{
    return date('M d  Y', strtotime($str));
}
// convert to a readable time string. eg.: 04:30 PM
function niceTime($str)
{
    return date('h:i A', strtotime($str));
}




    ?>