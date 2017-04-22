<?php
$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

$h->title = "Update Site Admin for $S->siteName";
$h->banner = "<h1>Update Site Admin For $S->siteName</h1>";
$h->css = "<style>#admin-wrapper { margin: .5rem; }</style>";

$s->site = "bartonlp.com/heather";

if(!$_GET && !$_POST) {
  $_GET['page'] = "admin"; // Force us to the admin page if not get or post
}

$updatepage = UpdateSite::secondHalf($S, $h, $s);

echo <<<EOF
$updatepage
EOF;
