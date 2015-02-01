<?php
// BLP 2015-02-01 -- Moved to digitalocean.com

$files = array('DCS-920.jpg', 'DCS-920a.jpg', 'asante_.jpg');
date_default_timezone_set('America/Los_Angeles');

foreach($files as $v) {
  $tm = filemtime($v);
  $tt = date("Y-m-d H:i:s T", $tm);
  $info[$v] = $tt;
}

echo <<<EOF
<!DOCTYPE html>
<html>
<head>
<title>Glen's Cabin in Big Bear</title>

<style>
h1, h2 { text-align: center; }
#picture {
	margin-left: auto;
	margin-right: auto;
	width: 810px;
}
</style>
</head>
<body>
<h1>Glen and Tina's Cabin in Big Bear and Home</h1>
<h2>Web Cam</h2>
<hr/>
<div id='picture'>
{$info['DCS-920.jpg']} Home Back Yard<br>
<img style="width: 800px" src='DCS-920.jpg' alt='web cam picture' />
{$info['DCS-920a.jpg']} Cabin Front Yard<br>
<img style="width: 800px" src='DCS-920a.jpg' alt='web cam picture' />

<p>New Camera:</p>
{$info['asante_.jpg']} Cabin Back Yard<br>
<img style='width: 800px;' src='asante_.jpg' alt='new web cam' />
</div>
</body>
</html>
EOF;



