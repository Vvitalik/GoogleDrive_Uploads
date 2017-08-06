<?php
require_once "autorize.php";
require_once 'classes/ManageFileClass.php';

$classList = new \classes\ManageFileClass();
$getFileList = $classList->getFileList($client);

?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" multiple name="file[]">
    <input type="submit" name="submit" value="Upload to Google Drive">
</form>

<table>
<?php foreach ($getFileList as $num => $file) { ?>
    <tr>
        <td><a href='/'> <?=$file->name ?> </a></td>
        <td><a href='/delete.php?file_id=<?=$file->id ?>'> Delete file </a></td>
    </tr>
<?php } ?>
</table>