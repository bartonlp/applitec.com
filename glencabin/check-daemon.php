#!/usr/bin/php
<?php
// Check the glencabin/FI9803P_00626E6C2B79/snap directory for any new files.
// Uses inotify which is a pecl package.
// sudo pecl install inotify
// You need phpize which is in the php7.0-dev (sudo apt install php7.0-dev)
// Then add it to php.ini. In this case I only added it to cli/php.ini (extension=inotify.so)

// IMPORTANT INFO
// This is a systemd service. The file glencabin.service (in this directory) gets moved to
// /etc/systemd/system and systemd runs this file. See the 'glencabin.service' file for more
// /details.

file_put_contents("/var/www/applitec/glencabin/check-daemon.pid", "");

$pid = pcntl_fork();

if($pid) {
  // Only the parent will know the PID. Kids aren't self-aware
  // Parent says goodbye!
  file_put_contents("/var/www/applitec/glencabin/check-daemon.pid", "$pid\n");
  error_log("check-daemon.php, Parent pid: " . getmypid());
  exit(0);
}

error_log("check-daemon.php, Child1 pid: " . getmypid());

// Child becomes session leader

if(posix_setsid() === -1) {
  error_log("check-daemon.php: posix_setsid==-1");
  exit(1);
}

usleep(100000);  //100,000 us=10ms

fclose(STDIN);
fclose(STDOUT);
fclose(STDERR);

// Child reopens stdio to null

fopen('/dev/null', 'r'); // set fd/0, stdin
fopen('/dev/null', 'w'); // set fd/1, stdout
fopen('/dev/null', 'w'); // set fd/2, stderr

// Ignore all Signals. This shouldn't be a problem because we have removed terminal.

pcntl_signal(SIGTSTP, SIG_IGN);
pcntl_signal(SIGTTOU, SIG_IGN);
pcntl_signal(SIGTTIN, SIG_IGN);
pcntl_signal(SIGHUP, SIG_IGN);

// Change directory to /

chdir("/");

error_log("check-daemon.php, Daemonized");

$fd = inotify_init();
$watch_descriptor = inotify_add_watch($fd, "/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap", IN_CREATE);

while(true) {
  $event = inotify_read($fd);
      
  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/Front*.jpg");

  if(!empty($tmp)) {
    sort($tmp);

    rename($tmp[count($tmp) -1], "/var/www/applitec/glencabin/newjpg.jpg");

    foreach($tmp as $v) {
      unlink($v);
    }
  }

  $tmp = glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/snap/*.jpg");

  if(!empty($tmp)) {
    if(count($tmp) > 50) {
      $n = count($tmp) - 50;
      sort($tmp);
      for($i=0; $i < $n; ++$i) {
        unlink($tmp[$i]);
      }
    }
  }

  // Remove everything from .../record

  array_map('unlink', glob("/var/www/applitec/glencabin/FI9803P_00626E6C2B79/record/*"));
}
