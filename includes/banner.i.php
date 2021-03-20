<?php
// BLP 2021-03-09 -- remove all navigation as site is no longer used 
return <<<EOF
<header>
  <div id="topTitleDiv">
    <a href="/">Applied Technology Resources,&nbsp;Inc.</a>
  </div>

  $mainTitle
  <noscript>
  <p style='color: red; background-color: #FFE4E1; padding: 10px'>
  Your browser either does not support <b>JavaScripts</b> or you have JavaScripts disabled, in either case your browsing
  experience will be significantly impaired. If your browser supports JavaScripts but you have it disabled consider enabaling
  JavaScripts conditionally if your browser supports that. Sorry for the inconvienence.</p>
  </noscript>
</header>
EOF;
