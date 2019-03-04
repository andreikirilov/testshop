<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Оформить заказ</h4>
    <?php if (!$result): ?>
        <p>Выбрано товаров: <?php echo $totalCount; ?>, на сумму: <?php echo $totalPrice; ?></p>
        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
        <form action="#" method="post">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Имя" value="<?php echo $userName; ?>"/>
            <br>
            <label for="phone">Номер телефона</label>
            <input type="text" name="phone" placeholder="Номер телефона" value="<?php echo $userPhone; ?>"/>
            <br>
            <label for="comment">Комментарий</label>
            <input type="text" name="comment" placeholder="Комментарий" value="<?php echo $userComment; ?>"/>
            <br>
            <input type="submit" name="submit" value="Оформить" />
        </form>
        <?php if ($errorArr): ?>
            <ul>
                <?php foreach ($errorArr as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <p>Заказ оформлен. Мы свяжемся с вами!</p>
    <?php endif; ?>
</div>
<?php include ROOT . "/view/footer.php"; ?>