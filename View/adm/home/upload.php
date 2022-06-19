<?php

$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'uploads';   //2
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['paciente_nome'];          //3             
    $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
    $targetFile = $targetPath . $_FILES['file']['paciente_foto'];  //5
    move_uploaded_file($tempFile, $targetFile); //6
}
?> 
