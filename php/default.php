<?php
  include_once("zipstream.php");

  $selpics = explode(",", $_POST["selpics"]);

  $zip = new ZipStream($selpics[0] . ' of ' . $selpics[1] . '.zip');
  $zip->setComment('Created using Album downloader by Manoj khanna');

  for ($i = 2; $i < count($selpics); $i++) {
    $j = $i - 1;
    $zip->openStream($selpics[0] . ' ' . $j . '.jpg');
    $zip->addStreamData(file_get_contents($selpics[$i]));
    $zip->closeStream();
  }

  $zip->finalize();
?>