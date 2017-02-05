<?php
return <<<EOF
<header>
<div id="topTitleDiv">
<a href="/">
Applied Technology Resources,&nbsp;Inc.
</a>
<img id='logo' src='http://bartonphillips.net/images/blank.png'>
<img id='dummyimg' src='/tracker.php?page=normal&id=$this->LAST_ID'>
</div>
<nav>
<!-- Big Nav Map -->
<div id="navMap">
<ul>
  <li>
    <a href="applitecSitemap.php">
      Site Map
    </a>
  </li>
  <li>
    <a href="AtriBio.php">
      Company Information
    </a>
  </li>
  <li>
    <a href="refrenc.php">
      References
    </a>
  </li>
  <li>
    <a href="contactus.php">
      Contact Us
    </a>
  </li>
</ul>
</div>

<!-- Nav bar for small screens -->
<div id="smallNavMap">
  <label for="smallmenu" class="icon-menu">Menu</label>
  <input type="checkbox" id="smallmenu" role="button">
  <ul id="smenu">
    <li><a href="/">Home</a></li>
    <li><a href="applitecSitemap.php">Site Map</a></li>
    <li><a href="AtriBio.php">Company Info</a></li>
    <li><a href="refrenc.php">References</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
  </ul>
</div>
</nav>
$mainTitle
<noscript>
<p style='color: red; background-color: #FFE4E1; padding: 10px'>
<!-- <img src="tracker.php?page=noscript&id=$this->LAST_ID"> -->
Your browser either does not support <b>JavaScripts</b> or you have JavaScripts disabled, in either case your browsing
experience will be significantly impaired. If your browser supports JavaScripts but you have it disabled consider enabaling
JavaScripts conditionally if your browser supports that. Sorry for the inconvienence.</p>
</noscript>
</header>
EOF;
