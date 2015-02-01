<?php

require_once("/var/www/includes/siteautoload.class.php");
$S = new Applitec;

$h->title = "About This Site";
$h->css = <<<EOF
  <style>
main {
  text-align: center;
}
img[alt^='jQuery'] {
  background-color: black;
}
#powered-by {
  width: 90px;
  height: 53px;
}
#apache {
  width: 400px;
  height: 148px;
}

@media (max-width: 39em) {
  #apache, #best-with {
    width: 100%;
  }
}
  </style>
EOF;

list($top, $footer) = $S->getPageTopBottom($h);

echo <<<EOF
$top
<main id='content'>
<h2>About This Web Site and Server</h2>

<div id="aboutWesssbSite">

<div id="runWith">
  <p>Designed by Barton L. Phillips<br/>
     Copyright &copy; 2015<a
     href="mailto:bartonphillips@gmail.com">Barton L. Phillips</a></p>
  
	<p>This site is hosted by <a href="http://digitalocean.com">
		 <img align="middle"
						alt="Digital Ocean"
						src="http://bartonlp.com/html/images/digitalocean.jpg")">
		 </a>
		 </p>

  <p>This site is run with Linux, Apache, MySql, and PHP.</p>
	<p><img src="http://bartonlp.com/html/images/linux-powered.gif"
    alt="Linux Powered"></p>
	<p><a href="http://www.apache.org/">
    <img id="apache" src="http://bartonlp.com/html/images/apache_logo.gif"
      alt="Apache"</a></p>
	<p><a href="http://www.mysql.com">
    <img src="http://bartonlp.com/html/images/powered_by_mysql.gif"
      alt="Powered by MySql"></a></p>
	<p><a href="http://www.php.net">
    <img src="http://bartonlp.com/html/images/php-small-white.png"
      alt="PHP Powered"></a></p>
  <p><a href="http://jquery.com/">
    <img src="http://bartonlp.com/html/images/logo_jquery_215x53.gif"
      alt="jQuery logo"/></a></p>
  <p><a href="http://www.mozilla.org">
    <img id="best-viewed"
      src="http://bartonlp.com/html/images/bestviewedwithmozillabig.gif"
      alt="Best viewed with Mozilla or any other browser"></a></p>
	<p><a href="http://www.mozilla.org">
    <img src="http://bartonlp.com/html/images/shirt3-small.gif" alt="Mozilla"></a></p>
	<p><img src="http://bartonlp.com/html/images/msfree.png" alt="100% Microsoft Free"></p>

	<p><a
  href="http://www.netcraft.com/whats?url=http://www.applitec.com">
	<img id="powered-by" src="http://bartonlp.com/html/images/powered.gif"
    alt="Powered By ...?"></a>
	</p>
</div>
</div>

</main>
$footer
EOF;
