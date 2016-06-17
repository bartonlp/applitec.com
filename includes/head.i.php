<?php
return <<<EOF
<!DOCTYPE html> 
<html>
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
  <link rel="stylesheet" href="css/nav.css">
{$arg['link']}
  <link rel="stylesheet" title="Applitec Style Sheet" href="css/applitec.css">
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>
var lastId = $this->LAST_ID;
jQuery(document).ready(function($) {
  $("#logo").attr('src', "/tracker.php?page=script&id=$this->LAST_ID");
});
  </script>
  <script src="http://bartonlp.com/html/js/fingerprint2.js"></script>
  <script src="http://bartonlp.com/html/js/fingerprint.js"></script>
  <script async src="/blp/js/tracker.js"></script>
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
<body>
EOF;
