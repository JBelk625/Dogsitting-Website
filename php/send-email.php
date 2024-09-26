<?


$fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$streetaddress = filter_input(INPUT_POST, "streetaddress", FILTER_SANITIZE_SPECIAL_CHARS);
$qtypets = $_POST["qtypets"];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];
$contactpref = $_POST["contactpref"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp-relay.brevo.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "ha";
$mail->Password = "dpvg tkob hlai xaun";

$mail->setFrom($email, $fname);
$mail->addAddress("happytalesstl@gmail.com");

$mail->Subject = "New Client Form";
$mail->Body = "<p>Name: {$fname}, {$lname}</p><p>Email: {$email}</p><p>Phone: {$phone}</p><p>Address: {$streetaddress}</p><p># Pets: {$qtypets}</p><p>Dates: {$startdate}, {$enddate}</p><p>Contact Pref: {$contactpref}</p>"

$mail->send();

echo "email sent";



?>