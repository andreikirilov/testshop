<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Редактирование личных данных</h4>
    <?php if (!$result): ?>
        <form action="#" method="post">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Имя" value="<?php echo $userName; ?>"/>
            <br>
            <label for="password">Пароль</label>
            <input type="password" name="password" placeholder="Пароль" value="<?php echo $userPass; ?>"/>
            <br>
            <input type="submit" name="submit" value="Сохранить" />
        </form>
        <?php if ($errorArr): ?>
            <ul>
                <?php foreach ($errorArr as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <p>Данные отредактированы!</p>
    <?php endif; ?>
</div>
<?php include ROOT . "/view/footer.php"; ?>