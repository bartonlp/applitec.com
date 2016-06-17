<?php
// BLP 2015-01-14 -- use siteautoload
$_site = require_once(getenv("HOME")."/includes/siteautoload.class.php");
$S = new $_site['className']($_site);

$h->title = "AppliTech Site Map -- Electrical, Software, ".
            "Firmware Engineering Consulting";

$h->css =<<<EOF
  <style>
main {
  margin-top: 2em;
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<main>
<table>
<tr>
<td>
<img src="/blp/images/CIRCULA.gif" alt="">
</td>
<td valign=bottom><h1>Site Map</h1></td>
</tr>
</table>

<hr>
<ul>
<li><a href="index.php">Applitec Home Page</a></li>
<li><a href="AtriBio.php">Company Information and Biography</a></li>
<li><a href="refrenc.php">References</a></li>
<li><a href="contactus.php">Contact Us</a></li>
<li><a href="aboutwebsite.php">About This Website</a></li>
<li><a href="webstats-new.php">Webstats</a></li>
</ul>
</main>
$footer
EOF;
