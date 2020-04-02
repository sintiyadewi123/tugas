<?php echo $__env->make('base/header_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php
  $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
?>

<input type="button" value="Go Back" onclick="history.back(-1)" />
<?php echo $__env->make('base/script_page5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\kmb\kursusOnline-master\kursusOnline-master\resources\views/base/ting.blade.php ENDPATH**/ ?>