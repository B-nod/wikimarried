<?php
 if($_SERVER['HTTP_HOST']!='localhost'){?>
<base href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/">
<?php } else { ?>
<base href="https://<?php echo $_SERVER['HTTP_HOST']; ?><?php echo str_replace('\\',"/",(end(explode('htdocs',dirname(__FILE__)))));  ?>/">
<?php } ?>
