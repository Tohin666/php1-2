<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Cart</title>-->
<!--    <link rel="stylesheet" href="../public/style.css">-->
<!--</head>-->
<!--<body>-->

<h1>Корзина</h1>

<?php if ($cartArray):
    $total = null;
    ?>
    <table class="cartTable">
        <tr>
            <td>Название</td>
            <td>Количество</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>

        <?php foreach ($cartArray as $product):
            if (gettype($product) == 'array'): ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['price'] ?> руб.</td>
                <td><?= $product['sum'] ?> руб.</td>
                <td>
                    <form action=""><input type="submit" value="Удалить" name="<?= $product['id'] ?>"></form>
                </td>
            </tr>
        <?php endif; endforeach; ?>
    </table>

    <h3>Сумма к оплате: <?= $cartArray[0] ?> руб.</h3>
    <form action=""><input type="submit" value="Заказать" name="button"></form>

<?php else:
    echo 'Корзина пуста';
endif;
?>

<!--</body>-->
<!--</html>-->