<?php
//   $SQLDEBUG = true;
//   $ERRORDEBUG = true;

// This is the site specific part of the two file set of files for UpdateSite insertions.
// This is the FIRST part that gets the selection information, that is, it scans the site's Document Root to find which
// PHP files have insert areas marked (// START UpdateSite ...)
// The full set of files are in includes/ and are:
// 1) the class file 'updatesite.class.php'
// 2) the first part include 'updatesite1.i.php' (used by this file)
// 3) the second part include 'updatesite2.i.php' used by the $nextfilename (like updatesite2.php)
// 4) the preview include 'updatesite-preview.php' which can be in the $nextfilename file.
// Item 4 is not manditory and can either be ignored or replaced by your own function updatesite_preview(...).
// I have a simpler version of the preview 'updatesite-simple-preview.php' that can be used instead.

$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

// Get site info
$h->title = "Update Site For $S->siteName";
$h->banner = "<h1>Update Site For $S->siteName</h1>";
$h->css = "<style>#firsthalf-wrapper { margin: .5rem; }</style>";
$h->nofooter = true;
$footer = $S->getPageFooter("<br><a href='updatesiteadmin.php'>Administer Update Site Table</a><br/><hr>");

// UpdateSite::firstHalf() and secondHalf() are static members.
// UpdateSite::firstHalf($S, $h, [$nextfilename]);
// The third parameter is optional.
// $nextfilename can be set if we want a file other than the default which is "/updatesite2.php".

$page = UpdateSite::firstHalf($S, $h);

echo <<<EOF
$page
$footer
EOF;
