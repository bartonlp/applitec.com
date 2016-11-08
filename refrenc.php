<?php
$_site = require_once(getenv("SITELOAD")."/siteload.php");
ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

$h->title = "AppliTech References -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);

$sql = "select company, contact, description from refs where status='active'";
$S->query($sql);
while(list($company, $contact, $desc) = $S->fetchrow('num')) {
  $dl .= <<<EOF
<dt>$company: $contact</dt>
<dd>$desc</dd>
EOF;
}
$dl = "<dl>\n$dl\n</dl>";

echo <<<EOF
$top
<main>
<img style="margin-top: 10px;" src="http://bartonphillips.net/images/CYLINDR.gif" alt="">
<h2>Company References</H2>
$dl
<h3>Links:</h3>
<ul>
   <li><a href="https://www.linkedin.com/in/glen-h-humphrey-24238a14?trk=nav_responsive_tab_profile_pic">Glen Humphrey on Linkedin</a> </li>
   <li><a href="https://www.linkedin.com/in/barton-phillips-b37919b">
      Barton Phillips on Linkedin</a></li>
   <li><a href="http://www.facebook.com/bartonlp">Barton Phillips on Facebook</a></li>
</ul>   

<h3>Patents</h3>

<ul>
<li>Unitek Patent, Capacitive discharge welding power supply, No. 60/897,379:
<a href="http://www.freshpatents.com/Capacitive-discharge-welding-power-supply-and-capacitive-discharge-welder-using-the-same-dt20080724ptan20080173626.php">Link</a></li>

<li>Harris Patent, Wireless butt set, Patent 6252942:
<a href="https://www.google.com/patents/US6252942">Link</a></li>
</ul>

</main>
$footer
EOF;
