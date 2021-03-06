<?php
$_site = require_once(getenv("SITELOADNAME"));
ErrorClass::setDevelopment(true);
ErrorClass::setNoEmailErrs(true);
$S = new $_site->className($_site);


$files = array('newjpg.jpg'=>'Home Front Yard', 'DCS-920.jpg'=>'Home Back Yard',
               'DCS-920a.jpg'=>'Cabin Front Yard', 'asanteCamera_.jpg'=>'Cabin Back Yard');

date_default_timezone_set('America/New_York');

$info = '';
foreach($files as $k=>$v) {
  $tm = filemtime($k);
  $tt = date("Y-m-d H:i:s T", $tm);
  $info .= <<<EOF
$tt $v<br>
<img src="$k" alt="$v">
EOF;
}

$h->css =<<<EOF
  <style>
h1, h2 { text-align: center; }
#picture {
	margin-left: auto;
	margin-right: auto;
	width: 810px;
}
#picture img {
  width: 800px;
}
  </style>
EOF;

$h->banner = "<h1>Glen and Tina's Cabin in Big Bear and Home</h1><h2>Web Cam</h2>";

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<hr/>
<div id='picture'>
$info
<p><a href='alarm.php'>Check Alarms</a></p>
</div>
<hr>
$footer
EOF;

