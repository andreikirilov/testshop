<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Корзина</h4>
    <?php if ($itemInCart): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Цена</th>
                <th>Ссылка</th>
                <th>Количество</th>
                <th>Добавить</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($itemArr as $item): ?>
                <tr>
                    <td><?php echo $item["id"]; ?></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td class="itemCurPrice<?php echo $item["id"]; ?>"><?php echo $item["price"]; ?></td>
                    <td><a href="/item/<?php echo $item["id"]; ?>">*</a></td>
                    <td class="itemCurCount<?php echo $item["id"]; ?>"><?php echo $itemInCart[$item["id"]]; ?></td>
                    <td><a href="#" class="addAjax" itemId="<?php echo $item["id"]; ?>">+</a></td>
                    <td><a href="#" class="delAjax" itemId="<?php echo $item["id"]; ?>">-</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6">Общая стоимость</td>
                <th class="totalPrice"><?php echo $totalPrice; ?></th>
            </tr>
        </table>
        <br>
        <a href="/cart/order/">Оформить заказ</a>
    <?php else: ?>
        <p>Корзина пуста</p>
    <?php endif; ?>
</div>
<?php include ROOT . "/view/footer.php"; ?>