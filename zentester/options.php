<script type="text/javascript">
    function ZentesterFormatKey()
    {
        current_key = document.getElementById("zentester_test_key").value;
        key_check = current_key.match(/\<script type="text\/javascript" src="http:\/\/app.zentester.com\/index.php\/remote\/load_zentester\/(.*?)\/zentester.js"/);   
        if (key_check!=null)
        {
            current_key = key_check[1];
            document.getElementById("zentester_test_key").value = current_key;  
        }
        
        
    }
</script>
<div class="wrap">
<h2>Zentester</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('zentester'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Your Zentester Test Key (This is 16 characters long and looks something like "Xuai9u9Basbad3DA" if you simply copy and paste all the test javascript code into this box that will work too):</th>
<td><input type="text" name="zentester_test_key" id="zentester_test_key" onchange="ZentesterFormatKey()" value="<?php echo get_option('zentester_test_key'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>