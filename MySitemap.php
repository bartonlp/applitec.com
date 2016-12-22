<?php
// BLP 2015-02-20 -- added 'copywrite' to siteinfo.  
// Site map
// This is included by the /siteautoload.php which is called from each page file.
// This file should only be loaded via the siteautoload.php file.
// This file has the sitemap which defines the various location where things can be found.
// DOC_ROOT and SITE_ROOT are defined by the siteautoload.class.php
// TOP is the path to the very top of the website. For example on digitalocean.com that is
// /var/www. All the sites are relative to TOP. The main include directory which has
// SiteClass.class.php is at TOP . "/includes/".
// SITE_INCLUDES is under the SITE_ROOT which is where we found the '.sitemap.php' file during
// our search in siteautoload.class.php. On digitalocean.com this would be something like
// '/var/www/bartonphillipsdotcom/'.
// After the four path defines we have defines for our LOGFILE and the email addresses used to
// send emails when errors occur.
// After the email defines we have two arrays, one for the database information ($dbinfo),
// and one for the site information ($siteinfo). These are used by the Database class and 
// SiteClass.class.php.
   
define('TOP', '/var/www'); // for bartonlp.com which is like our Dell-530 home system.
define('INCLUDES', TOP."/includes"); // /var/www/includes
define('DATABASE_ENGINES', INCLUDES."/database-engines");
//define('SITE_INCLUDES', SITE_ROOT."/includes"); // SITE_ROOT is defined in siteautoload.php!
define('SITE_INCLUDES', __DIR__ ."/includes");

// Email info

define('EMAILADDRESS', "bartonphillips@gmail.com");
define('EMAILRETURN', "bartonphillips@gmail.com");
define('EMAILFROM', "webmaster@applitec.com");

// Database connection information
// 'engine' is the type of database engine to use. Options are 'mysqli', 'sqlite'.
// Others may be added later
           
$dbinfo = array('host' => 'localhost',
                'user' => 'barton',
                'password' => '7098653',
                'database' => 'applitecdotcom',
                'engine' => 'mysqli'
               );

// SiteClass information
// This site has no members so no membertable.
// See the SiteClass constructor for other possible values like 'count',
// 'emailDomain' etc.

$__year = date('Y');

$siteinfo = array('siteDomain' => "applitec.com",
                  'siteName' => "Applitec",
                  //'emailDomain' => "applitec.com",
                  'path' => '/var/www/applitec',
                  'copyright' => "$__year Applied Technology Resources Inc.",
                  'author' => "Barton L. Phillips, Applitec Inc., mailto:barton@applitec.com",
                  'className' => "SiteClass",
                  //'memberTable' => "applitec",
                  'masterdb' => 'barton',
                  'dbinfo' => $dbinfo,
                  'headFile' => SITE_INCLUDES."/head.i.php",
                  'bannerFile' => SITE_INCLUDES."/banner.i.php",
                  'footerFile' => SITE_INCLUDES."/footer.i.php",
                  'count' => true,
                  'countMe' => true, // Count BLP
                  'trackerImg1' => "/images/blank.png", // script
                  'trackerImg2' => "/images/blank.png", // normal
                  'myUri' => "bartonphillips.dyndns.org",
                  'EMAILADDRESS' => EMAILADDRESS,
                  'EMAILRETURN' =>EMAILRETURN,
                  'EMAILFROM' => EMAILFROM,
                 );