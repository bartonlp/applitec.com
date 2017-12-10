<?php
$_site = require_once(getenv("SITELOADNAME"));
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

$s->siteclass = $S;
$s->page = "contactus.php"; // the name of this page
$s->itemname ="Message1"; // the item we want to get first

$u = new UpdateSite($s); // Should do this outside of the '// START UpdateSite ...' comments

// Now getItem gets the info for the $s->itemname sections
// The special comments around each getItem() are MANDATORY and are used by the UpdateSite class
// to maintain the information in the 'site' table in the bartonphillipsdotorg database at
// bartonphillips.com

// START UpdateSite Message1
$item = $u->getItem();
// END UpdateSite Message1

// If item is false then no item in table

if($item !== false) {
  $msg1 = $item['bodytext'];
}

$s->itemname ="CSS";

// START UpdateSite CSS
$item = $u->getItem($s);
// END UpdateSite CSS

if($item !== false) {
  $CSS = $item['bodytext'];
} else {
  $CSS =<<<EOF
  <style>
main {
  margin-top: 2em;
}
main table {
  line-height: 2em;
}
  </style>
EOF;
}
   
$s->itemname = "BANNER";

// START UpdateSite BANNER
$item = $u->getItem($s);
// END UpdateSite BANNER

if($item !== fasle) {
  $BANNER = $item['bodytext'];
}

// End of UpdateSite logic

$h->banner = $BANNER;
$h->css = $CSS;

$h->title = "AppliTech Contact Us -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);
  
echo <<<EOF
$top
$msg1
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
