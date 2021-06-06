<script type='text/javascript'>

    var shipment_fee = 0;

    function chargeFee(fee){
        var total_bill = <?php echo $_SESSION['order']['total_bill']?>;
        total_bill += fee;
        html = "Total Bill:<br>$" + total_bill;
        document.getElementsByClassName("total_bill_container")[0].innerHTML = html;
    }

    function validatePurchase() {
        var shipment = 'None';
        var payment = 'None';

        const shipments = document.querySelectorAll('input[name="shipment-method"]');
        for (const rb of shipments) {
            if (rb.checked) {
                shipment = rb.value;
                break
            }
        }

        const payments = document.querySelectorAll('input[name="payment-method"]');
        for (const rb of payments) {
            if (rb.checked) {
                payment = rb.value;
                break;
            }
        }
        console.log(payment);
        if (shipment == 'None') {
            alert('Please choose shipment method!');
            return false;
        }

        if (payment == 'None') {
            alert('Please choose payment method!');
            return false;
        }
        let in_cart = <?php echo count($cart)?>;
        if (in_cart == 0) {
            alert("Cart Empty, can not create Order!");
            return false;
        }
        return true;
    }
    


</script>
<form action="<?php echo BASE_PATH ?>/orders/confirmPurchase" method="POST" onsubmit="return validatePurchase()">
<table>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
    </tr>
<?php
    //var_dump($user['0']['User']['id']);
    foreach ($cart as $item) { // thong tin san pham lay tu trong bien $item nay nhe son
        //echo "<tr><td>".json_encode($item['Product'])."</td>";
        echo "<tr><td>".$item['Product']['name']."</td>";
        echo "<td>".$item['buy_qty']."</td></tr>";
    }
?>
    <tr>
        <td>Sum</td>
        <td><?php echo $_SESSION['order']['total_bill'] ?></td>
        <input type="hidden" name="user_id" value=<?php echo $user['id']?>>
    </tr>
</table>
Choose Shipment Method
<br>
<?php 
    foreach ($shipment_methods as $method) {
        $method_id = $method['Shipment']['id'];
        ?>
            <input type="radio" name="shipment-method" onchange="chargeFee(<?php echo $method['Shipment']['fee']?>)" id="<?php echo $method['Shipment']['method']?>" value=<?php echo $method_id?>>
            <label for="<?php echo $method['Shipment']['method']?>" ><?php echo $method['Shipment']['method']."\nFee: ".$method['Shipment']['fee']?></label>
        <?php
    }
?>
<br>
Choose Payment Method
<br>
<?php 
    foreach ($payment_methods as $method) {
        $method_id = $method['Payment']['id'];
        ?>
            <input type="radio" name="payment-method" id="<?php echo $method['Payment']['method']?>" value=<?php echo $method_id?>>
            <label for="<?php echo $method['Payment']['method']?>" ><?php echo $method['Payment']['method']?></label>
        <?php
        //<a href="<?php echo BASE_PATH /orders/confirmOrder">
    }
?>
<br>
<table>
    <tr>
        <td>Address</td>
        <td><input required type="text" name="address" value="<?php echo $user['address']?>"></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input required type="text" name="phone" value="<?php echo $user['phone']?>"></td>
    </tr>
</table>
<div class= "total_bill_container">
    Total Bill:
    <br>
    <?php echo '$'.$_SESSION['order']['total_bill']?>
</div>
<input type="submit" name="confirmPurchase" value="Confirm Purchase">
</form>
<!--<button><a href="<!?php echo BASE_PATH?>/users/update">Your profile</a></button><br>
