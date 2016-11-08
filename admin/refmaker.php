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

switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
  case "POST":
    switch(strtolower($_POST['page'])) {
      case "post":
        postedits($S);
        break;
      case "postadmin":
        postadmin($S);
        break;
      default:
        // Bad post?
        break;
    }
    break;
  case "GET":
    switch(strtolower($_GET['page'])) {
      case "edit":
        $S->type = 'edit';
        $S->id = $_GET['id'];
      case "add":
        editaddpage($S);
        break;
      case "admin":
        adminpage($S);
        break;
      default:
        startpage($S);
        break;
    }
}

exit();

// Start Page

function startpage($S) {
  // Start page show the table with the id's as edit links
  $h->title = "Reference Maker";
  $h->css = <<<EOF
  <style>
main {
  padding: 1em;
}
#refstable * {
  padding: 5px;
  border: 1px solid black;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);
  
  $T = new dbTables($S);
  $sql = "select id as ID, company as Company, contact as Contact, ".
         "description as Description from refs where status='active'";

  function callback(&$row, &$desc) {
    global $S;
    $id = $row['ID'];
    $row['ID'] = "<a href='$S->self?page=edit&id=$id'>$id</a>";
  }

  list($tbl) = $T->maketable($sql, array("callback"=>callback, "attr"=>array("id"=>'refstable')));

echo <<<EOF
$top
<main>
<h1>Reference Maker</h1>
$S->posted
$tbl
<br>
<a href="$S->self?page=add">Add New Reference</a><br>
<a href="$S->self?page=admin">Admin References</a><br>
<a href="/">Return to Applitec Home Page</a>
</main>
$footer
EOF;
}

// Edit Page. Edit or Add a new row.

function editaddpage($S) {
  if($S->type == 'edit') {
    $h->title = "Edit Reference";
    $sql = "select company, contact, description from refs where id='$S->id' and status='active'";
    $S->query($sql);
    list($company, $contact, $desc) = $S->fetchrow('num');
    $idstr = "<input type='hidden' name='id' value='$S->id'>";
  }

  $h->css = <<<EOF
  <style>
main {
  padding: 1em;
}
form input[type='text'] {
 width: 10em;
 font-size: 1em;
}
main table {
  width: 100%;
  line-height: 2em;
}
main table th {
  width: 5em;
}
main input[type='submit'] {
  font-size: 1.2em;
  border-radius: 1em;
  padding: .5em;
}
form textarea {
  width: 100%;
  height: 10em;
  font-size: 1em;
}
  </style>
EOF;
  
  list($top, $footer) = $S->getPageTopBottom($h);

  echo <<<EOF
$top
<main>
<h1>Edit Reference</h1>
<form method="post">
<table>
<tr><th>Company</th>
<td><input type="text" name="company" value="$company"></td>
</tr>
<tr>
<th>Contact</th>
<td><input type="text" name="contact" value="$contact"></td>
</tr>
<tr>
<th>Description</th>
<td><textarea name="desc">$desc</textarea></td>
</tr>
<tr><th colspan="2"><input type="submit" value="Submit"></th></tr>
</table>
<input type="hidden" name="page" value="post">
$idstr
</form>
<a href="$S->self">Reference Maker Main Page</a>
<main>
$footer
EOF;
}

// Post Edits

function postedits($S) {
  $company = $_POST['company'];
  $contact = $_POST['contact'];
  $desc = $_POST['desc'];
  if($id = $_POST['id']) {
    $sql = "update refs set company='$company', contact='$contact', description='$desc' ".
           "where id='$id'";

    $S->posted = "<h3>Edit Posted</h3>";
  } else {
    $sql = "insert into refs (company, contact, description, created) ".
           "values('$company', '$contact', '$desc', now())";
    $S->posted = "<h3>Add Posted</h3>";
  }
  $S->query($sql);

  header("location: $S->self");
}

// Admin Page

function adminpage($S) {
  // Start page show the table with the id's as edit links
  $h->title = "Reference Admin";
  $h->css = <<<EOF
  <style>
main {
  padding: 1em;
}
#refstable * {
  padding: 5px;
  border: 1px solid black;
}
#refstable td:first-child table, #refstable td:first-child table td {
  padding: 0px;
  padding-left: 3px;
  border: none;
}
input[type='submit'] {
  padding: .5em;
  border-radius: 1em;
  font-size: 1em;
}
  </style>
EOF;

  list($top, $footer) = $S->getPageTopBottom($h);
  
  $T = new dbTables($S);
  $sql = "select 'Status', id as ID, company as Company, contact as Contact, ".
         "description as Description, status as Status from refs";
  function callback(&$row, &$desc) {
    $which = array('active'=>0, 'inactive'=>1, 'delete'=>2);
    $status = $row['Status'];
    $checked[$which[$status]] = 'checked';

    $id = $row['ID'];
    $row['Status'] = <<<EOF
<table>
<tr><td>A</td><td><input type='radio' $checked[0] name='status[$id]' value='active'></td></tr>
<tr><td>I</td><td><input type='radio' $checked[1] name='status[$id]' value='inactive'></td></tr>
<tr><td>D</td><td><input type='radio' $checked[2] name='status[$id]' value='delete'></td></tr>
</table>
EOF;
  }

  list($tbl) = $T->maketable($sql, array("callback"=>callback,
                                         "attr"=>array("id"=>'refstable')));

echo <<<EOF
$top
<main>
<h1>Reference Admin</h1>
<form method="post">
$tbl
<br>
<input type="submit" value="Submit">
<input type="hidden" name="page" value="postadmin">
</form>
<br>
<a href="$S->self">Reference Maker Main Page</a><br>
<a href="$S->self?page=add">Add New Reference</a><br>
<a href="$S->self?page=admin">Admin References</a>
<hr>
</main>
$footer
EOF;
}

// Post Admin

function postadmin($S) {
  foreach($_POST['status'] as $k=>$v) {
    $sql = "update refs set status='$v' where id='$k'";
    $S->query($sql);
  }

  $S->posted = "<h3>Admin Info Posted</h3>";
  header("location: $S->self");
}
