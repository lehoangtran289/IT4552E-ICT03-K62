<div><h2>Please select a category</h2>
    <?php foreach ($categories as $category): ?>
        <div class="category">
            
            <?php
                echo $html->link($category['Category']['brand'], 'categories/view/' . $category['Category']['id'] . '/' . $category['Category']['brand']) ?>
        
        </div>
    <?php endforeach ?>
</div>
<button><a href="../Project/users/login">Sign in</a> <br></button>
<button><a href="../Project/users/register">Register</a></button>