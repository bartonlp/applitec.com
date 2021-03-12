<?php
// BLP 2018-05-11 -- ADD 'NO GOOD MSIE' message
// BLP 2017-03-21 -- css/applitec.css and js/tracker.js are symlinks to
// /var/www/bartonphillipsnet/css or js. This is for https.

if(!$this->isBot) {
  if(preg_match("~^.*(?:(msie\s*\d*)|(trident\/*\s*\d*)).*$~i", $this->agent, $m)) {
    $which = $m[1] ? $m[1] : $m[2];
    echo <<<EOF
<!DOCTYPE html>
<html>
<head>
  <title>NO GOOD MSIE</title>
</head>
<body>
<div style="background-color: red; color: white; padding: 10px;">
Your browser's <b>User Agent String</b> says it is:<br>
$m[0]<br>
Sorry you are using Microsoft's Broken Internet Explorer ($which).</div>
<div>
<p>You should upgrade to Windows 10 and Edge if you must use MS-Windows.</p>
<p>Better yet get <a href="https://www.google.com/chrome/"><b>Google Chrome</b></a>
or <a href="https://www.mozilla.org/en-US/firefox/"><b>Mozilla Firefox</b>.</p></a>
These two browsers will work with almost all previous
versions of Windows and are very up to date.</p>
<b>Better yet remove MS-Windows from your
system and install Linux instead.
Sorry but I just can not continue to support ancient versions of browsers.</b></p>
</div>
</body>
</html>
EOF;
    exit();
  }
}

return <<<EOF
<head>
  <title>{$arg['title']}</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta charset='utf-8'>
  <meta name="copyright" content="$this->copyright">
  <meta name="Author" content="$this->author">
  <!-- Link our custom CSS -->
  <link rel="stylesheet" title="Applitec Style Sheet" href="https://bartonphillips.net/css/applitec.css">
{$arg['link']}
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
<body>
EOF;
 