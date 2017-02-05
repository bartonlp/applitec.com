<?php
$_site = require_once(getenv("SITELOAD")."/siteload.php");
ErrorClass::setDevelopment(true);
$S = new $_site->className($_site);

$h->title = "AppliTech Company Information -- Electrical, Software, ".
            "Firmware Engineering Consulting";

$h->css = <<<EOF
  <style>
.underline { text-decoration: underline; }
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<main>
<img src="http://bartonphillips.net/images/museum.gif" alt="">
<h2>Company Information</h2>
<p><i>Appli</i><b>Tech</b> was founded in 1987 to provide
its clients technical capabilities of unique depth
and diversity.
We specializing in hardware and software design for small computer and
consumer product. <i>Appli</i><b>Tech</b> provides full engineering support,
including specification writing, analysis, application software, embedded
firmware, analog and digital circuit design; as well as complete computer
aided schematic capture, layout, fabrication, and testing. 
</p>

<p><span class="aptr">Applied Technology Resources Inc.</span> provides team support at any level,
and project continuity that lasts the entire life of your program. Whether
you need individual on-site engineering assistance or an engineering company
to assume complete project responsibility we are here to help you.
</p>

<p><b>Representative Industries and
Clients:&nbsp;<a href="#top"><img src="http://bartonphillips.net/images/back.gif" alt="Return to top"
border="0" height="40" width="40"></a></b>
</p>
<ul>
<dl>
<dt>Entertainment:</dt>
<dd><i>Walt Disney Imagineering</i></dd>
<br>
<dt>Medical &amp; Banking</dt>
<dd><i>Beckman Coulter</i></dd>
<dd>9172 Eton Avenue</dd>
<dd>Chatsworth, CA 91311-5874</dd>
<br>
<dd><i>Posey Company</i></dd>
<dd>5635 Peck Rd. </dd>
<dd>Arcadia, CA 91006-0020 USA</dd>
<br>
<dt>Test & Measurement:</dt>
<dd><i>Beckman Coulter</i></dd>
<dd>9172 Eton Avenue</dd>
<dd>Chatsworth, CA 91311-5874</dd>
<br>
<dt>Manufacturing:</dt>
<dd><i>Miyachi Unitek Corporation 2011</i></dd>
<dd>1820 S. Myrtle Ave.
<dd> Monrovia, CA 91016 USA</dd>
</dl>
</ul>
<hr>

<h2><i>Appli</i><b>Tech</b> Principals</h2>

<h3 id="owner">Glen H. Humphrey &ndash; President.&nbsp;
<a href="#top"><img src="http://bartonphillips.net/images/back.gif" alt="Return to top"
border="0" height="40" width="40"></a>&nbsp; 
<a href="contactus.php?name=ghumphrey">ghumphrey@applitec.com</a>
<a href="contactus.php?name=ghumphrey"><img src="http://bartonphillips.net/images/butmail.gif" alt="Email Glen" border="0"
height="59" width="34"></a>
</h3>

<p>Mr. Humphrey has extensive experience in hardware design,
both analog and digital, as well as software development. His digital projects
have included the use of FPGA's. Analog designs include Video applications,
DC-DC power supplies (standard
and specialty high voltage greater then 300 volts), disk drive read channel,
battery operated consumer equipment and PLL systems. He has experience
in the use of mixed mode simulation tools, such as PSPICE,
for hardware design and system analysis. Software includes C,
PASCAL, and BASIC. Mr. Humphrey is one of the founders of AppliTech and
has a Bachelors degree in Mathematical Physics from California State University,
Northridge (CSUN) with additional academic education in software languages
and electronics hardware design.</p>

<h3>
Barton L. Phillips  
&nbsp;
<a href="#top">
  <img src="http://bartonphillips.net/images/back.gif" alt="Return to top" border="0" height="40" width="40">
</a>
&nbsp;
<a href="contactus.php?name=barton">barton@applitec.com&nbsp;</a>
<a href="contactus.php?name=barton">
  <img src="http://bartonphillips.net/images/butmail.gif" alt="Email Barton" border="0" height="59" width="34">
</a>
</h3>

<p>Mr. Phillips has over thirty years of comprehensive experience
in computer systems design and program management. His experience includes
medical and banking, computer peripherals, automated manufacturing, test
and measurement, high-end telecommunication, and distributed database systems.
He has done many embedded designs including motor controllers, and servo
positioning systems; ESDI, ST506, and SCSI disk controllers. He also has
a broad communication and networking background with TCP/IP, NFS, ISDN,
and ATM protocol software and hardware. Mr. Phillips has extensive high-level
application software experience, and has designed word processors, assemblers,
interpreters, compilers, and operating systems. He has many years of programming
experience with MS-DOS, MS-Windows, Sun and AT&amp;T
UNIX, Mac OSX and Linux; as well as embedded operating environments.
He is fluent in 'C', 'C++', Pascal, Visual Basic, and Assembly
language, as well as most scripting languages like Perl, PHP and Python. 
Mr. Phillips received his Bachelors degree from the University
of California at Los Angeles in 1964.</p>

<h3>
Alan Marcnak
&nbsp;
<a href="#top">
  <img src="http://bartonphillips.net/images/back.gif" alt="Return to top" border="0" height="40" width="40">
</a>
&nbsp;
<a href="contactus.php?name=alan">alan@applitec.com&nbsp;</a>
<a href="contactus.php?name=alan">
  <img src="http://bartonphillips.net/images/butmail.gif" alt="Email Allan" border="0" height="59" width="34">
</a>
</h3>

<p>Mr. Marcinak began working for Applitec in 1998 and brings with him a wide
range of experience in many fields.  They include assisting in development of circuits
and/or test equipment for industrial controls and liquid hydrocarbon measurement,
electronic weight scale, instrumentation amplifiers for aerospace and military,
medical equipment, servo positioning systems for disk and tape drives, and telecom equipment.
These involved analog and digital design, assembly language programming, parts procurement,
prototype construction, surface mount work, test, debug, documentation, and on-site equipment installation.
Mr. Marcinak has a BS in Electronic Engineering Technology from California Polytechnic State University, San Luis Obispo, CA.
</p>

<p><a href="#top"><img src="http://bartonphillips.net/images/back.gif" alt="Return to top" border="0" height="40"
width="40"></a><br><br>

</main>
$footer
EOF;
