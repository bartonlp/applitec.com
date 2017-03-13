<?php
// Glen & Tina's Cabin in Big Bear and their Home

$_site = require_once(getenv("SITELOAD")."/siteload.php");
$S = new $_site->className($_site);

date_default_timezone_set('America/Los_Angeles');

$glob = glob("FI9803P_00626E6C2B79/snap/MDAlarm*.jpg");
$info = '<tbody>';

for($j=0; $j<count($glob) -1; ++$j) {
  if(($j % 3) == 0) {
    $info .= "<tr>";
  }
  $tm = filemtime($glob[$j]);
  $tt = date("Y-m-d H:i:s T", $tm);
  $file = basename($glob[$j]);
  $info .= "<td>$tt<br><img class='image' src='$glob[$j]' alt='$file'></td>";
  if(($j % 3) == 2) {
    $info .= "</tr>";
  }
}

if(($j % 3) != 0) {
  $info .= "</tr>";
}
$info .= "</tbody>";

$h->script = <<<EOF
  <script>
jQuery(document).ready(function($) {
  $(".image").click(function() {
    $("#picture").hide();
    var filename = $(this).attr('src');
    var name = $(this).attr('alt');
    console.log("filename", filename);
    $("#BigPhoto").html("<p><b>Click on image to dismiss</b></p><img src='"+filename+"' alt='"+name+"'>").show();
    return false;
  });

  $("#BigPhoto").click(function() {
    $(this).hide();
    $("#picture").show();
    return false;
  });
});
  </script>
EOF;

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
#BigPhoto {
  max-width: 100%;
  margin: 1rem;
}
  </style>
EOF;
$h->banner = "<h1>Alarms</h1><h2>Web Cam</h2>";

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<hr/>

<table id='picture'>
<thead>
<tr><th colspan="3">Click on any Photo to Enlarge</th></tr>
</thead>
$info
</table>
<div id="BigPhoto"></div>
<hr>
$footer
EOF;



