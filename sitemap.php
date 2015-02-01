<?php
// BLP 2015-01-14 -- use siteautoload
require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

$h->title = "AppliTech Site Map -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<br>
<table border=0>
<tr>
<td>
<img border=0 src="images/CIRCULA.gif" alt="">
</td>
<td valign=bottom><h1>Site Map</h1></td>
</tr>
</table>

<hr>
<ul>
<li><a href="index.php">Applitec Home Page</a></li>
<li><a href="AtriBio.php">Company Information and Biography</a></li>
<li><a href="refrence.php">References</a></li>
<li><a href="contactus.php">Contact Us</a></li>
<li><a href="aboutwebsite.php">About This Website</a></li>
</ul>
$footer
EOF;
