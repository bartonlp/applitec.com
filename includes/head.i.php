<?php
// BLP 2017-03-21 -- css/applitec.css and js/tracker.js are symlinks to
// /var/www/bartonphillipsnet/css or js. This is for https.

return <<<EOF
<head>
  <title>{$arg['title']}</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta charset='utf-8'>
  <meta name="copyright" content="$this->copyright">
  <meta name="Author" content="$this->author">
  <meta name="Description" content="{$arg['desc']}">
  <meta name="KeyWords" content="Engineering, Electrical Engineering, Programming, Firmware, Software, Test Equipment,
        Computers, SCSI Software, SCSI Firmware, FPLD, FPGA, EPLD, CPLD, Windows, UNIX, Linux, Consulting,
        Analysis, Controllers, ISDN, Network, ATM, Internet, 
        USB, C, C++">
  <link rev="MADE" href="mailto:barton@applitec.com"> 
  <!-- Link our custom CSS -->
  <link rel="stylesheet" title="Applitec Style Sheet" href="https://bartonphillips.net/css/applitec.css">
{$arg['link']}
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>
var lastId = $this->LAST_ID;
jQuery(document).ready(function($) {
  $("#logo").attr('src', "tracker.php?page=script&id=$this->LAST_ID");
});
  </script>
  <script async src="https://bartonphillips.net/js/tracker.js"></script>
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
<body>
EOF;
 