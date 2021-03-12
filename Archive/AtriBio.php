<?php
$_site = require_once(getenv("SITELOADNAME"));
ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

$s->siteclass = $S;
$s->page = "AtriBio.php"; // the name of this page
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
  $CSS = <<<EOF
  <style>
.underline { text-decoration: underline; }
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

$h->title = "AppliTech Company Information -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
$msg1
$footer
EOF;
