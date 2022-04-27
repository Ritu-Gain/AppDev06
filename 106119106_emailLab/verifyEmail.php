<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Email Verification</title>
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php
if($_GET['key'] && $_GET['token'])
{
include "db.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($conn,
"SELECT * FROM `users` WHERE `email_link`='".$token."' and `email`='".$email."';"
);
$d = date('Y-m-d H:i:s');
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['email_verified_at'] == NULL){
mysqli_query($conn,"UPDATE users set email_verified_at ='" . $d . "' WHERE email='" . $email . "'");
$msg = " Your email has been verified";
}else{
$msg = "You are already verified before!";
}
} else {
$msg = "This email is not registered";
}
}
else
{
$msg = "Something went wrong.";
}
?>
<div class="container mt-3">
<div class="card">
<div class="card-header text-center">
Email Verification
</div>
<div class="card-body">
<p><?php echo $msg; ?></p>
</div>
</div>
</div>
</body>
</html>