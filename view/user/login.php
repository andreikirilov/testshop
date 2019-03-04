<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Вход</h4>
    <form action="#" method="post">
        <label for="E-mail">E-mail</label>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
        <br>
        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $userPass; ?>"/>
        <br>
        <input type="submit" name="submit" value="Вход" />
    </form>
    <?php if (!empty($errorArr)): ?>
        <ul>
            <?php foreach ($errorArr as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php include ROOT . "/view/footer.php"; ?>