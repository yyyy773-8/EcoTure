<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>История заказов</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>История моих заказов</h2>
    <?php
    require_once '../../app/models/Basket.php';
    $basketModel = new Basket();
    $orders = $basketModel->getOrdersByUser($_SESSION['user']['id']);
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID заказа</th>
                <th>Продукт</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Дата покупки</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['productName']; ?></td>
                    <td><?= $order['quantity']; ?></td>
                    <td>$ <?= number_format($order['price'], 2); ?></td>
                    <td><?= date('Y-m-d H:i:s', strtotime($order['created_at'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
