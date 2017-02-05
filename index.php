<?php
$_site = require_once(getenv("SITELOAD")."/siteload.php");
//ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

$h->title = "AppliTech Home Page: -- Electrical Consultine";

list($top, $footer) = $S->getPageTopBottom($h);

// ***********
// Render Page
// ***********

echo <<<EOF
$top
<!-- Main body of the page -->
<main>
  <h1>Applitec Services</h1>
  <section id="applitecServices">

    <article id="appservEE">
      <h3>Electronic Engineering</h3>
      <ul>
        <li>Digital Design</li>
        <li>Analog Design</li>
        <li>Circuit Analysis</li>
        <li>Power, Power Supplies, Micro Welders</li>
        <li>Manufacturing Test Equipment</li>
        <li>Laboratory Equipment</li>
        <li>MTBF Analysis</li>
        <li>Failure Analysis and Reports</li>
      </ul>
    </article>

    <article id="appservPD">
      <h3>Electronic Product Development</h3>
      <ul>
        <li>CompLete Turnkey Product Design
          <ul>
            <li>Concept</li>
            <li>Implementation</li>
            <li>Final Documentation</li>
            <li>Packaging</li>
          </ul>
        <li>State of the Art Engineering
          <ul>
            <li>Digital Signal Processors</li>
            <li>Field Programmable Gate Arrays</li>
            <li>Programmable Logic Devices</li>
          </ul>
      </ul>
    </article>

    <article id="appservCAD">
      <h3>Design Services</h3>
      <ul>
        <li>Computer Aided Design</li>
        <ul>
          <li>Schematic Capture	(Orcad and others)</li>
          <li>PCBA Routing (PADS PowerPCB)</li>
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
    </article>
  </section>
</main>
$footer
EOF;

