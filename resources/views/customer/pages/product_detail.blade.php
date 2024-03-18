

    <style>
        body {
            background-color: white;
        }
        #out_of_stock {
            width: 90px;
            height: auto;
            position: absolute;
            margin: -24px 0 0 -50px;
            rotate: 30deg;
        }
        #sold_out {
            width: 200px;
            height: auto;
            position: absolute;
            margin: 10% 0 0 -24%;
        }
    </style>
    <title> Product's Detail</title>

<body>
<div>

        <table style="margin-top: 90px;" width="100%" border="0" cellspacing="0">
            <tr>
                <td width="90px" rowspan="2"></td>
                <td width="480px" rowspan="2">
                    <img src="../../image/" width="420px" height="auto">

                </td>
                <td style="vertical-align: top; color: black">
                    <p class="product_name_detail">clothe['name'] ?</p>
                    <p class="product_price_detail">$clothe['price'</p>
                    <p>Description:</p> $clothe['description']
                    <p>Size:  $clothe['size']</p>
                    <p>Color: $clothe['color']</p>
                </td>
                <td width="100px" rowspan="2"></td>
            </tr>
            <tr>
                <td style="vertical-align: middle">
                        (['quantity'] > 0 ){
                    <button class="button add-to-cart">
                        <a style="color: white" class="link" href="../carts/add to cart.php?id=">
                            Add to cart
                        </a>
                    </button>

                </td>
            </tr>
        </table>
</div>

</body>
</html>
