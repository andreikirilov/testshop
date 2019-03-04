<?php include ROOT . "/view/header.php"; ?>
<div>
    <h4>Все товары</h4>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Цена</th>
            <th>Ссылка</th>
        </tr>
        <?php foreach ($itemArr as $item): ?>
            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo $item["price"]; ?></td>
                <td><a href="/item/<?php echo $item["id"]; ?>">*</a></td>
                <td><a href="#" class="addAjax" itemId="<?php echo $item["id"]; ?>">+</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $pagination->get(); ?>
</div>
<?php include ROOT . "/view/footer.php"; ?>
