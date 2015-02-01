<?php
// BLP 2015-01-14 -- use siteautoload
require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

$h->title = "AppliTech Contact Us -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);

  
echo <<<EOF
$top
<main>
<p>Contact us via E-Mail: </p>
<div align="left">

<table border="0">
  <tr>
    <td>Glen Humphrey:</td>
    <td><a HREF="mailto:ghumphrey@applitec.com">ghumphrey@applitec.com</a></td>
  </tr>
  <tr>
    <td>Barton Phillips:</td>
    <td><a HREF="mailto:barton@applitec.com">barton@applitec.com</a> </td>
  </tr>

</table>
</div>
</main>
$footer
EOF;
