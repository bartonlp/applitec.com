<?php
// BLP 2015-02-16 -- refmaker.php. Make the reference talbe info for the referenc.php
// This will 1) show table, 2) edit row, 3) add row, 4) mark row for deletion.
// The main (first) page is show table.

/*
CREATE TABLE `refs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `description` text,
  `last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` datetime DEFAULT NULL,
  `status` enum('active','inactive','delete') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
*/

$_site = require_once(getenv("SITELOAD")."/siteload.php");
$S = new $_site->className($_site);

$ar = file("tmp.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$desc = '';
$n = 0;

foreach($ar as $v) {
  if(preg_match("~<dt>(.*?):\s*(.*?)</dt>~", $v, $m)) {
    if($n == 0) {
      $company = $m[1];
      $contact = $m[2];
      $n++;
      continue;
    }
      

    $desc = $S->escape($desc);

    $desc = preg_replace("~<dd>(.*?)</dd>~", "$1", $desc);
    $sql = "insert into refs (company, contact, description, status, created) ".
           "values('$company', '$contact', '$desc', 'active', now())";
    $S->query($sql);
    
    $desc = '';
    $company = $m[1];
    $contact = $m[2];
    continue;
  }

  $desc .= $v;
}
echo "DONE<br>";  
