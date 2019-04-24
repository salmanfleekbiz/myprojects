<?php 
$data = $_POST['imageurl'];
$photo = str_replace('data:image/jpeg;base64,', '', $data);
$entry = base64_decode($photo);
$image = imagecreatefromstring($entry);
$directory = 'images/'.rand() . '.png';
header ( 'Content-type:image/jpeg' ); 
imagejpeg($image, $directory);
imagedestroy ( $image ); 
readfile ( $directory );
exit ();
echo 'Image upload Successfully';
?>