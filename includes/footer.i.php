<?php

$lastmod = date("M j, Y H:i", getlastmod());

return <<<EOF
<footer>
Return to Applitec <a class='underline' href="/">Home Page</a>
{$arg['msg']}
{$arg['msg1']}
<h2 class='center'><a href="/aboutwebsite.php">About This Site</a></h2>
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
<p class="center">Last Modified: $lastmod</p>
</footer>
</body>
</html>
EOF;
