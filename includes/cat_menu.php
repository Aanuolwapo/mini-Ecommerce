<ul class="p-b-54">
   <?php while($catmenu_data = mysqli_fetch_array($catmenu_result)) {?> 
    <li class="p-t-4">
        <a href="<?php echo $catmenu_data['store_cat'];?>.php" class="s-text13">
            <?php echo $catmenu_data['store_cat'];?>
        </a>
    </li>
    <?php } ?>
    
    
</ul>
