<?php
// BLP 2015-01-14 -- use siteautoload
require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

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
<img style="margin-top: 10px;" src="images/CYLINDR.gif" alt="">
<h2>Company References</H2>
$dl
<h3>Links:</h3>
<ul>
   <li><a href="http://www.linkedin.com/profile/view?id=48705746&authType=NAME_SEARCH&authToken=BGjz&locale=en_US&srchid=84ba3038-5887-4403-a057-0283317f3e98-0&srchindex=1&srchtotal=16&goback=%2Efps_PBCK_*1_Glenn_Humphrey_*1_*1_*1_*1_*2_*1_Y_*1_*1_*1_false_1_R_*1_*51_*1_*51_true_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2&pvs=ps&trk=pp_profile_name_link">Glen
      Humphrey on Linkedin</a> </li>
   <li><a href="http://www.linkedin.com/profile/view?id=35123227&authType=NAME_SEARCH&authToken=d304&locale=en_US&srchid=91c4892c-0102-4068-b981-d7c0ec05b52c-0&srchindex=1&srchtotal=4&goback=%2Efps_PBCK_*1_Barton_Phillips_*1_*1_*1_*1_*2_*1_Y_*1_*1_*1_false_1_R_*1_*51_*1_*51_true_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2_*2&pvs=ps&trk=pp_profile_name_link">
      Barton Phillips on Linkedin</a></li>
   <li><a href="http://www.facebook.com/bartonlp">Barton Phillips on Facebook</a></li>
</ul>   

<h3>Patents</h3>

<ul>
<li>Unitek Patent, Capacitive discharge welding power supply, No. 60/897,379:
<a href="http://www.freshpatents.com/Capacitive-discharge-welding-power-supply-and-capacitive-discharge-welder-using-the-same-dt20080724ptan20080173626.php">Link</a></li>

<li>Harris Patent, Wireless butt set, Patent 6252942:
<a href="http://www.patentstorm.us/patents/6252942/description.html">Link</a></li>
</ul>
<a href="/">Return to Applitec Home Page</a>
<main>
$footer
EOF;
