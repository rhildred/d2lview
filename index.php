<?php

require "vendor/autoload.php";

\D2LView\StaticPages::generate(".", "phtml");

$zip = new \ZipArchive();
$ret = $zip->open('courseShell.zip', ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
if ($ret !== TRUE) {
    printf('Failed with code %d', $ret);
} else {
    $zip->addGlob('*.{html,xml}', GLOB_BRACE);
    $zip->close();
}
