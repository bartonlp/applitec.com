<?php
$arg['title'] = "AppliTech Home Page: -- Electrical, Software, Firmware Engineering Consulting";
$arg['desc'] = "Applied Technology Resources, Inc. Home Page -- Engineering Consulting, Hardware and Software";
include("header.i.php");
include("banner.i.html");
echo <<<EOF
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

EOF;
include("footer.i.html");
?>

