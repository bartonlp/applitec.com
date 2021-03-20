<?php

return <<<EOF
<head>
  <title>{$arg['title']}</title>
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta charset='utf-8'>
  <meta name="copyright" content="$this->copyright">
  <meta name="Author" content="$this->author">
  <!-- Link our custom CSS -->
  <link rel="stylesheet" title="Applitec Style Sheet" href="https://bartonphillips.net/css/applitec.css">
{$arg['link']}
{$arg['extra']}
{$arg['script']}
{$arg['css']}
</head>
<body>
EOF;
 