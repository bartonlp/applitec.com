#!/usr/bin/php
<?php
// This file is run with 'nohup ./check.php&' and it puts its output into a file 'nohup.out'.
// At some point I need to change this to a real daemon!
//
// Check the glencabin/FI9803P_00626E6C2B79/snap directory for any new files.
// Uses inotify which is a pecl package.
// sudo pecl install inotify
// You need phpize which is in the php7.0-dev (sudo apt install php7.0-dev)
// Then add it to php.ini. In this case I only added it to cli/php.ini

echo "Start\n";

$fd = inotify_init();
$watch_descriptor = inotify_add_watch($fd, "/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap", IN_CREATE);

while(true) {
  $event = inotify_read($fd);
      
  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/Front*.jpg");

  if(!empty($tmp)) {
    sort($tmp);

    rename($tmp[count($tmp) -1], "/var/www/applitec/glencabin/newjpg.jpg");

    foreach($tmp as $v) {
      //echo "v: $v\n";
      unlink($v);
    }
  }

  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/*.jpg");

  if(!empty($tmp)) {
    if(count($tmp) > 10) {
      $n = count($tmp) - 10;
      sort($tmp);
      for($i=0; $i < $n; ++$i) {
        echo "removing $tmp[$i]\n";
        unlink($tmp[$i]);
      }
      echo "**************************************\n";
    }
  }
}
