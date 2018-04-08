<?php
require_once ("db_functions/get_products.php");
require_once ("db_functions/get_categories.php");
require_once ("bucket.php");

$product = get_product_by_id($_POST["submit"]);
if (isset($_POST['bucket_add'])){
    add_tobucket($_POST['bucket_add']);
    $_POST['bucket_add'] = "";
    unset($_POST['bucket_add']);
}
?>

<style>
    .product_view img {
        float: left;
        margin: 25px;
    }
    .product_view h2 {
        text-align: center;
        margin: 10px auto 30px auto;
        width: 100%;
    }
    table.product_info {
        padding: 20px 0;
        border: 0px;
        font-size: 1vw;
    }
    .product_description{

        font-size: 1vw;
        margin: 0 30px;
    }
</style>

<div class="product_view" style="padding: 15px;">
    <h2><?=$product['name'];?></h2>
    <img src="<?=$product['img']; ?>" height="300px" width="300px">
    <table class="product_info">
        <tr><td>Price</td><td>$<?=(float)$product['price'];?></td></tr>
        <tr><td>At storage</td><td><?=$product['SKU']; ?></td></tr>
        <tr><td>Product categories</td><td>
        <?php
        $i = 0;
        foreach ($product['categories'] as $value){
            if ($i){
                echo ", ";
            }
            $i++;
            echo get_category_name_by_id($value['categoryId']);
        }
        ?></td></tr>
        <tr>
            <td>
                    <input type="hidden" name="submit" value="<?=$product['id'];?>">
                    <button type="submit" name="bucket_add" value="<?=$product['id'];?>">Add to bucket</button>
            </td>
        </tr>
    </table>
    <br/>
</div>
<div class="product_description">
    <h3>Description:</h3><br/>
<?=$product['description'];?>
</div>