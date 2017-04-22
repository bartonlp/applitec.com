<?php
$_site = require_once(getenv("SITELOAD")."/siteload.php");
ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

if($name = $_POST['name']) {
  mail("$name@applitec.com",
       "{$_POST['subject']}",
       "{$_POST['message']}",
       "From: info@applitec.com\r\nBcc:bartonphillips@gmail.com\r\n");

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
  case 'alan':
    emailform('alan', $S);
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
    <td><a href="contactus.php?name=barton">barton@applitec.com</a></td>
  </tr>
  <tr>
    <td>Alan Marcnak:</td>
    <td><a href="contactus.php?name=alan">alan@applitec.com</a></td>
  </tr>
</table>
</div>
</main>
$footer
EOF;

function emailform($name, $S) {
  $h->title = "Email Form";
  $h->banner = "<h1 class='center'>Email to '$name@applitec.com'</h1>";
  $h->css =<<<EOF
  <style>
main {
  padding: 1em;
}
form input {
  font-size: 1rem;
  padding-left: .3rem;
}
form input[type='submit'] {
  height: 2rem;
  border-radius: .3em;
}
form textarea {
  width: 98%;
  height: 5rem;
  font-size: 1rem;
  padding-left: .3rem;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);

  echo <<<EOF
$top
<main>
<form method='post'>
<input type='text' name='subject' require autofocus placeholder='Subject'>
<br>
<textarea name='message' required placeholder="Message"></textarea>
<br>
<input type='submit' value='Send Mail'>
<input type='hidden' name='name' value='$name'>
</form>

</main>
$footer
EOF;
}
