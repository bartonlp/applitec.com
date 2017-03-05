#!/usr/bin/php
<?php
// Check the glencabin/FI9803P_00626E6C2B79/snap directory for any new files.
// Uses inotify which is a pecl package.
// sudo pecl install inotify
// You need phpize which is in the php7.0-dev (sudo apt install php7.0-dev)
// Then add it to php.ini. In this case I only added it to cli/php.ini
// I can run this with 'nohup ./check.php'. I will look at adding it to 'init' or something next.

echo "TEST\n";

$fd = inotify_init();
$watch_descriptor = inotify_add_watch($fd, "/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap", IN_CREATE);

while(true) {
  $event = inotify_read($fd);
  echo "Hit\n";
      
  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/Front*.jpg");

  //echo "glob: ";
  //var_dump($tmp);

  if(!empty($tmp)) {
    sort($tmp);

    rename($tmp[count($tmp) -1], "/var/www/applitec/glencabin/newjpg.jpg");

    foreach($tmp as $v) {
      //echo "v: $v\n";
      unlink($v);
    }
  }

/*  
  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/*.jpg");

  if(!empty($tmp)) {
    echo "removing All other jpgs\n";
    
    foreach($tmp as $v) {
      echo "v: $v\n";
      unlink($v);
    }
  }
*/  
  echo "**************************************\n\n";
}
