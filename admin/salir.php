<?php

session_start();
session_destroy();
//header('location: '.URL_DOMINIO_ADMIN);
echo "<script>
location.href='https://www.aduanaperu.com/admin/';
</script>";
exit();
?>