<?php
//
// Create a list of md files so we could have a nice readme to the repo
//
// Author: Ido Green | @greenido
//

//
// Const
//
$gitPathPre = "https://github.com/greenido/JavaScript-News/blob/master";
$fullList = array();
$mdFileName = "ListOfScripts.md";

//
// Start the party
//
exec("find *.md -follow", $files);
print_r($files);

foreach ($files as $name) {
  if ( !strpos($name, "README.md") ) {
    $name = str_replace("./AppsScript/", "", $name);
    $fName = "* [$name](" . $gitPathPre . "/" . $name . ")\n";
    array_push($fullList, $fName );
    file_put_contents($mdFileName, $fName, FILE_APPEND);
  }
}
echo "\n\n=== list of files: \n";
print_r($fullList);

