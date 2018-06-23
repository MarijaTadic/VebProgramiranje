<?php
$myemail  = "marijazivanovic07@gmail.com";

$yourname = check_input($_POST['yourname']);
$subject  = check_input($_POST['subject']);
$email    = check_input($_POST['email']);
$likeit   = check_input($_POST['likeit']);
$how_find = check_input($_POST['how']);
$comments = check_input($_POST['comments']);

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail adresa nije validna.");
}

mail($myemail, $subject, $message);

header('Location: thanks.html');
exit();

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Molimo vas da ispravite gresku:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
