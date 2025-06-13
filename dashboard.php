<?php
include 'auth.php';
check_auth();
include 'header.php';
?>
<div class="container">
    <h2>Личный кабинет</h2>
    <p>Добро пожаловать, пользователь!</p>
    <a href="logout.php" class="btn btn-secondary">Выйти</a>
</div>
<?php include 'footer.php'; ?>
