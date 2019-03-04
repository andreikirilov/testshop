<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Подробная информация о товаре</h4>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Цена</th>
            <th>В корзину</th>
        </tr>
        <tr>
            <td><?php echo $itemArr["id"]; ?></td>
            <td><?php echo $itemArr["name"]; ?></td>
            <td><?php echo $itemArr["price"]; ?></td>
            <td><a href="#" class="addAjax" itemId="<?php echo $itemArr["id"]; ?>">+</a></td>
        </tr>
    </table>
    <h5>Описание:</h5>
    <p><?php echo $itemArr["description"]; ?></p>
</div>
<?php include ROOT . "/view/footer.php"; ?>