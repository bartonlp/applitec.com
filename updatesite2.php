<?php
//   $SQLDEBUG = true;
//   $ERRORDEBUG = true;

// This is the second part of the update site logic.
// The full set of files are in includes/ and are:
// 1) the class file 'updatesite.class.php'
// 2) the preview include 'updatesite-preview.i.php' which can be in the $nextfilename file.
// Item 2 is not manditory and can either be ignored or replaced by your own function updatesite_preview(...)
// I have a simpler version of the preview 'updatesite-simple-preview.i.php' that can be used instead

$_site = require_once(getenv("SITELOADNAME"));
$S = new $_site->className($_site);

$h->title = "Update Site For $S->siteName";
$h->banner = "<h1>Update Site For $S->siteName</h1>";
$h->css = "<style>#startpage-wrapper { margin: .5rem; }</style>";
$h->nofooter = true; // don't have UpdateSite.class display the footers as we will do it below.

// This is some enhanced logic that shows the changes at once. You can cut and past this into other site versions of
// updatestie2.php!

$h->extra = <<<EOF
  <script type="text/javascript">
jQuery(document).ready(function() {
  var auto = 1;

  $("#updatesiteform #formtablesubmitth input")
  .after("<input type='button' id='render' style='display: none' value='Quick Preview'/>" +
        "<input type='button' id='autopreview' value='Stop Auto Preview' />");

  $("#updatesiteform").after("<div style='padding: 5px; border: 1px solid black' id='quickpreview'>");
  $("#quickpreview").html("<div style='border: 1px solid red'>TITLE: " + $("#formtitle").val() +
                            "</div>" + $("#formdesc").val());

  $("#autopreview").click(function() {
    if(auto) {
      $(this).val("Start Auto Preview");
      $("#render").show();
      auto = 0;
    } else {
      $(this).val("Stop Auto Preview");
      $("#render").hide();
      $("#render").click();
      auto = 1;
    }
  });

  $("#render").click(function() {
    $("#quickpreview").html("<div style='border: 1px solid red'>TITLE: " + $("#formtitle").val() +
                            "</div>" + $("#formdesc").val());
  });

  $("#formdesc, #formtitle").keyup(function() {
    if(!auto) return false;

    $("#quickpreview").html("<div style='border: 1px solid red'>TITLE: " + $("#formtitle").val() +
                            "</div>" + $("#formdesc").val());
  });
});
  </script>
EOF;

$footer = $S->getPageFooter("<br><a href='http://www.bartonphillips.com/howtowritehtml.php'>How to write HTML</a><br>");

// Load updatesite.class.php

UpdateSite::secondHalf($S, $h);

// footer created in secondHalf()

echo <<<EOF
$footer
EOF;
