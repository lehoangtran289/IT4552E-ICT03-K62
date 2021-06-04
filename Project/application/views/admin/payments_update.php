<script type="text/javascript">
    let validateForm = () => {
        let method = document.getElementsByName("method")[0].value;
        let description = document.getElementsByName("description")[0].value;
        
        if (!method || !description) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
        return true;
    }
</script>

<section>
    <div class="content-box">
        <div class="form-box">
            <br>
            <h2>Edit payment <?php echo $payment['Payment']['method'] ?></h2>
            <form action="<?php echo BASE_PATH . '/admin/payments/update/' . $payment['Payment']['id'] ?>" method="post"
                  onsubmit="return validateForm()">
                <table>
                    <tr class="input-box">
                        <td>Method</td>
                        <td><input type="text" name="method" value="<?php echo $payment['Payment']['method'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Description</td>
                        <td><input type="text" name="description"
                                   value="<?php echo $payment['Payment']['description'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>
