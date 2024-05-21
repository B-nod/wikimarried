<?php if($count > $limit){ ?>	
<div align="center" style="clear:both;">
  <div style="color: #7A7C7D; background-color: #E9E9E9; padding-top: 5px; text-align:center;">Results <?php echo $cntorder; ?>: You are at page <?php echo $page; ?> of <?php echo $pages; ?></div>
  <div style="color: #7A7C7D; background-color: #E9E9E9; padding: 5px 0; text-align:center;"><?php echo $pagelist; ?></div>
</div>
<?php } ?>
