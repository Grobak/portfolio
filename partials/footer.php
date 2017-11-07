<?php
  //include '../lib/debug.php';
?>
    </div> <!-- /container -->

   
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src=<?php echo WEBROOT."js/jquery.js"; ?> ></script>
    <?php if(isset($script)): ?>
        <?php echo $script ;  ?>
    <?php endif;  ?>
  </body>
</html>
