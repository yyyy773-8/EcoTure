<?php
// profile.php
require 'auth.php';    // session_start() и check_auth()
check_auth();
require 'db.php';      // подключает $conn = new mysqli(...)

// Получаем данные текущего пользователя из БД
$user_id = $_SESSION['user_id'];
// Подготовленный запрос для безопасности
$stmt = $conn->prepare("SELECT name, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $created_at);
$stmt->fetch();
$stmt->close();

// Заголовок страницы
include 'header.php';
?>

<div class="container py-5">
    <h1 class="mb-4">Личный кабинет</h1>
    <!-- Блок профиля -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Профиль пользователя</h5>
            <p><strong>Имя:</strong> <?= htmlspecialchars($name) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Дата регистрации:</strong> <?= htmlspecialchars($created_at) ?></p>
            <a href="edit_profile.php" class="btn btn-outline-primary me-2">Изменить данные</a>
            <a href="change_password.php" class="btn btn-outline-warning">Сменить пароль</a>
        </div>
    </div>

    <!-- Кнопка выйти (ещё раз на случай) -->
    <div class="mb-4">
        <a href="logout.php" class="btn btn-danger">Выйти из аккаунта</a>
    </div>

    <!-- Пример: История расчётов -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">История расчётов</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Тип услуги</th>
                            <th>Параметры</th>
                            <th>Сумма (₽)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Предполагаем наличие таблицы calculations с полями: user_id, service_type, parameters, result_price, created_at
                        $stmt2 = $conn->prepare("SELECT service_type, parameters, result_price, created_at FROM calculations WHERE user_id = ? ORDER BY created_at DESC");
                        $stmt2->bind_param("i", $user_id);
                        $stmt2->execute();
                        $stmt2->bind_result($stype, $params, $price, $cdate);
                        $hasRows = false;
                        while ($stmt2->fetch()):
                            $hasRows = true;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($cdate) ?></td>
                            <td><?= htmlspecialchars($stype) ?></td>
                            <td>
                            <?php
                            $decoded = json_decode($params, true);
                            if (is_array($decoded) && isset($decoded['room_type'], $decoded['area'])) {
                                echo "Тип помещения: " . htmlspecialchars($decoded['room_type']) . "<br>Площадь: " . htmlspecialchars($decoded['area']) . " м²";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                            <td><?= htmlspecialchars($price) ?></td>
                        </tr>
                        <?php endwhile;
                        $stmt2->close();
                        if (!$hasRows): ?>
                        <tr><td colspan="4" class="text-center">Нет записей</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
