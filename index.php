<?php
// BLP 2015-01-14 -- Moved from Register.com around Jan. 10, 2015. Initially I put a
// header() redirect in the index.php on the register.com server. I am in the
// process of transfering the applitec.com domain name from Register.com to
// eNom.com. When the move is finalized I will up date these comments.
// Applitec.com does not YET use the siteautoload.php mechanism and instead includes
// its header.i.php, banner.i.php and footer.i.php files manually. I will endevor to
// upgrade these pages to use the siteautoload like all of the other sites.

require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

$h->title = "AppliTech Home Page: -- Electrical, Software, ".
            "Firmware Engineering Consulting";

list($top, $footer) = $S->getPageTopBottom($h);
echo <<<EOF
$top
<!-- Main body of the page -->
<main id="applitecServices">
  <h1>Applitec Services</h1>

  <div id="appservEE">
  <h3>Electronic Engineering</h3>
  <ul>
    <li>Digital design</li>
    <li>Analog design</li>
    <li>Circuit analysis</li>
    <li>Power, Power Supplies, Micro Welders</li>
    <li>Manufacturing Test Equipment</li>
    <li>Laboratory Equipment</li>
    <li>MTBF analysis</li>
    <li>Failure analysis and reports</li>
  </ul>
  </div>

  <div id="appservPD">
  <h3>Electronic Product Development</h3>
  <ul>
    <li>Complete turnkey product design from concept to final documentation and packaging.</li>
    <li>State of the art engineering using the latest Digital Signal Processors,
        Field Programmable Gate Arrays, Programmable Logic Devices</li>
  </ul>
  </div>

  <div id="appservCAD">
  <h3>Design Services</h3>
  <ul>
    <li>Computer Aided Design</li>
    <ul>
      <li>Schematic Capture	(Orcad and others)</li>
      <li>PCBA routing (PADS PowerPCB)</li>
    </ul>
  </ul>
    <ul>
      <li>Proto-type and Production</li>
      <ul>
        <li>Fabrication</li>
        <li>Parts Procurement</li>
        <li>Assembly</li>
        <li>Testing</li>
      </ul>
    </ul>
  </ul>
    <ul>
      <li>Field Programmable Logic Devices</li>
      <ul>
        <li>Altera</li>
        <li>Lattice</li>
      </ul>
    </ul>
  </ul>
 
  </div>
</main>
$footer
EOF;

