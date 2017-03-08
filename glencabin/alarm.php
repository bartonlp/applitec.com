<?php
// Glen & Tina's Cabin in Big Bear and their Home

$_site = require_once(getenv("SITELOAD")."/siteload.php");
$S = new $_site->className($_site);

date_default_timezone_set('America/Los_Angeles');

$glob = glob("FI9803P_00626E6C2B79/snap/MDAlarm*.jpg");
$info = '';

for($j=0; $j<count($glob) -1; ++$j) {
  if(($j % 3) == 0) {
    $info .= "<tr>";
  }
  $tm = filemtime($glob[$j]);
  $tt = date("Y-m-d H:i:s T", $tm);
  $file = basename($glob[$j]);
  $info .= "<td>$tt<br><img src='$glob[$j]' alt='$file'></td>";
  if(($j % 3) == 2) {
    $info .= "</tr>";
  }
}

if(($j % 3) != 0) {
  $info .= "</tr>";
}

$h->css =<<<EOF
  <style>
h1, h2 { text-align: center; }
#picture {
  margin: auto;
  width: 1200px;
}
#picture img {
  width: 100%;
}
  </style>
EOF;
$h->banner = "<h1>Alarms</h1><h2>Web Cam</h2>";

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<hr/>
<table id='picture'>
$info
</table>
<hr>
$footer
EOF;



