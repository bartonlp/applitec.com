<?php
// BLP 2015-01-14 -- Site class for Applitec.com

class Applitec extends SiteClass {
  public $blpIp;
  
  /**
   * Constructor
   *
   * @param array|object $x
   *  fields: host, user, password, database, siteDomain, subDomain, memberTable, headFile,
   *  bannerFile, footerFile, nodb, count, daycountwhat, emailDomain these fields are all protected.
   *  If there are more elements in $s they become public properties.
   * $x defaults to a null array but it can be overriden by either an array or an object.
   *  If I make $x=null the foreach() gives an error if nothing is passed in.
   */
  
  public function __construct($x=array()) {
    global $dbinfo, $siteinfo; // from .sitemap.php

    Error::setNoEmailErrs(true); // For debugging
    Error::setDevelopment(true); // during development

    $s = $siteinfo; // from .sitemap.php
    $s['databaseClass'] = new Database($dbinfo);

    // If $x has values then add/modify the $s array
    
    if(!is_null($x)) foreach($x as $k=>$v) {
      $s[$k] = $v;
    }

    return parent::__construct($s);
  }

  public function isBlp() {
    return $this->isMe();
  }

}

// Callback to get the user id for SqlError

if(!function_exists('ErrorGetId')) {
  function ErrorGetId() {
    $id = "IP=$_SERVER[REMOTE_ADDR], AGENT=$_SERVER[HTTP_USER_AGENT]";
    
    return $id;
  }
}
