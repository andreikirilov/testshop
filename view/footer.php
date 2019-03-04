<hr><div><b>F O O T E R</b></div></body></html>
<script src="/template/js/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(".addAjax").click(function () {
            var itemId = $(this).attr("itemId");
            $.post("/cart/addAjax/" + itemId, {}, function (data) {
                $(".itemCount").html(data);
                $(".itemCurCount" + itemId).html(parseInt($(".itemCurCount" + itemId).text()) + 1);
                $(".totalPrice").html(parseInt($(".totalPrice").text()) + parseInt($(".itemCurPrice" + itemId).text()));
            });
            return false;
        });
        $(".delAjax").click(function () {
            var itemId = $(this).attr("itemId");
            $.post("/cart/delAjax/" + itemId, {}, function (data) {
                $(".itemCount").html(data);
                var itemCurCount = parseInt($(".itemCurCount" + itemId).text());
                if (itemCurCount > 0) {
                    $(".itemCurCount" + itemId).html(itemCurCount - 1);
                    $(".totalPrice").html($(".totalPrice").text() - $(".itemCurPrice" + itemId).text());
                }
            });
            return false;
        });
    });
</script>