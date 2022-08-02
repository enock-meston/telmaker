<?php
session_start();
include "../include/condig.php";
$_SESSION['admin_id']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
