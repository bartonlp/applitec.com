<?php
  echo <<<EOF
<!DOCTYPE html> 
<html>
<head>
  <title>{$arg['title']}</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta charset='utf-8'>
  <meta name="Author" content="Barton L. Phillips, Applitec Inc., mailto:barton@applitec.com">
  <meta name="Description" content="{$arg['desc']}">
  <meta name="KeyWords" content="Engineering, Electrical Engineering, Programming, Firmware, Software, Test Equipment,
        Computers, SCSI Software, SCSI Firmware, FPLD, FPGA, EPLD, CPLD, Windows, UNIX, Linux, Consulting,
        Analysis, Controllers, ISDN, Network, ATM, Internet, 
        USB, C, C++">
 
  <link rev="MADE" href="mailto:barton@applitec.com"> 

  <!-- Link our custom CSS -->
  <link rel="stylesheet" title="Applitec Style Sheet" href="applitec.css">
{$arg['link']}
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
<body>
EOF;
?>