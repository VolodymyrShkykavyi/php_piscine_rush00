<?php
require_once("db_functions/orders_func.php");
require_once("db_functions/get_products.php");

if (isset($_POST['make_order']) && $_POST['make_order'] == "Order") {
    $_POST['make_order'] = NULL;
    unset($_POST['make_order']);
    if (isset($_SESSION['id']) && isset($_SESSION['id']) && $_SESSION['id'] && $_SESSION['login']) {
        echo "Order status: ";
        $product_arr = array();
        $error = "";
        $price = 0;
        foreach ($_SESSION['bucket'] as $value) {
            if (!get_product_by_id($value['id']))
                $error = $error . ", {$value['name']}";
            $price += $value['count'] * $value['price'];
            $product_arr[] = array('id' => $value['id'], 'count' => $value['count']);
        }
        $error = trim($error, ", ");
        if (strlen($error)) {
            echo "FAIL<br/>We aren't sell this products: {$error}<br/>";
        } else {
            if (!isset($value['price']) || !add_order($_SESSION['id'], $product_arr, $price)) {
                echo "FAIL<br/>Something going wrong. Please try again later.";
            } else {
                echo "SUCCESS";
            }
        }
    } else {
        echo "<h2 style='color: #BE0000; text-align: center;'>Please login first</h2>";
    }
}
if (isset($_SESSION['id']) && isset($_SESSION['id']) && $_SESSION['id'] && $_SESSION['login']) {
    echo "<br/><h3>All orders:</h3>";
    $all_orders = get_orders_by_user_id($_SESSION['id']);
    if (!$all_orders || empty($all_orders)){
        echo "no orders yet";
        return;
    }
    $all_orders = array_reverse($all_orders);

?>
<table>
    <tr style="text-align: center"><td>Id</td><td>Date</td><td>Products</td><td>Price</td></tr>
<?php
    foreach ($all_orders as $order){
?>

    <tr>
        <td><?=$order['id']; ?></td>
        <td><?=$order['date_order']; ?></td>
        <td>
<?php
        $product_arr = unserialize($order['products']);
        $str = "";
        foreach ($product_arr as $value){
            $name = get_product_by_id($value['id'])['name'];
            $count = $value['count'];
            $str = $str . ", {$name}({$count}) ";
        }
        $str = trim($str, ", ");
        echo $str;
?>
        </td>
        <td><?=$order['price']; ?></td>
    </tr>
<?php
    }
}
?>
</table>
