<br>
<?php
mysqli_close($conn);
include 'template/Footeur.html';
if ($_SESSION['debug']){phpinfo ( INFO_ALL );};
?>
