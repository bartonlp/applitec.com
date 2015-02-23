<?php
// BLP 2015-01-14 -- use siteautoload
require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

if($name = $_POST['name']) {
  mail("$name@applitec.com",
       "{$_POST['subject']}",
       "{$_POST['message']}",
       "From: info@applitec.com\r\nBCC:bartonphillips@gmail.com\r\n");

  header("location: index.php");
  exit();
}
  
switch($_GET['name']) {
  case 'ghumphrey':
    emailform('ghumphrey', $S);
    exit();
  case 'barton':
    emailform('barton', $S);
    exit();
  default:
    break;
}

$h->title = "AppliTech Contact Us -- Electrical, Software, ".
            "Firmware Engineering Consulting";

$h->css =<<<EOF
  <style>
main {
  margin-top: 2em;
}
main table {
  line-height: 2em;
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h);
  
echo <<<EOF
$top
<main>
<h2>Contact us via E-Mail</h2>
<div align="left">
<table>
  <tr>
    <td>Glen Humphrey:</td>
    <td><a href="contactus.php?name=ghumphrey">ghumphrey@applitec.com</a></td>
  </tr>
  <tr>
    <td>Barton Phillips:</td>
    <td><a href="contactus.php?name=barton">barton@applitec.com</a> </td>
  </tr>

</table>
</div>
<a href="/">Return to Applitec Home Page</a>
</main>
$footer
EOF;

function emailform($name, $S) {
  $h->title = "Email Form";
  $h->banner = "<h1 class='center'>Email to $name</h1>";
  $h->css =<<<EOF
  <style>
main {
  padding: 1em;
}

form table {
  width: 98%;
  margin: auto;
}
form table th {
  width: 1px;
}
form input {
  font-size: 1em;
  width: 98%;
}
form input[type='submit'] {
  width: 6em;
  height: 2em;
  border-radius: 1em;
}
form textarea {
  width: 98%;
  height: 10em;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);

  echo <<<EOF
$top
<main>
<form method='post'>
<table id='emailform'>
<tr><th>Subject</th><td><input type='text' name='subject' autofocus></td></tr>
<tr><th>Message</th><td><textarea name='message'></textarea></td></tr>
<tr><th></th><td class='center'><input type='submit' value='Send Mail'></td><tr>
</table>
<input type='hidden' name='name' value='$name'>
</form>
<a href="/">Return to Applitec Home Page</a>
</main>
$footer
EOF;
}