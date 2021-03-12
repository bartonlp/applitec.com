<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

$h->title = "Update Site Admin for $S->siteName";
$h->banner = "<h1>Update Site Admin For $S->siteName</h1>";
$h->css = "<style>#admin-wrapper { margin: .5rem; }</style>";

if(!$_GET && !$_POST) {
  $_GET['page'] = "admin"; // Force us to the admin page if not get or post
}

// $s can have $s->head which can have a <head> section. Otherwise $s has no real meaining.
// if so it is the third param.

$updatepage = UpdateSite::secondHalf($S, $h);

echo <<<EOF
$updatepage
EOF;
