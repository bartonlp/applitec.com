<?php

return <<<EOF
<footer>
{$arg['msg']}

{$arg['msg1']}
<h2 class='center'><a href="webstats-new.php">Web Stats</a><br>
<a href="aboutwebsite.php">About This Site</a></h2>
<address>
  Copyright &copy; $this->copyright<br>
  23542 Lyons Ave. #209<br>
  Newhall, CA 91321<br>
  <a href="mailto:barton@applitec.com?SUBJECT=WebMaster+feedback">webmaster@applitec.com</a><br>
  Phone: (818)652-9849<br>
</address>
<hr>
{$arg['msg2']}
$counterWigget
</footer>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10235592; 
var sc_invisible=1; 
var sc_security="ecfab7a7"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/free-hit-counter/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/10235592/0/ecfab7a7/1/"
alt="free hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</body>
</html>
EOF;
