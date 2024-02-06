<!doctype html>
<html lang="en">

  <head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?php echo $__env->make('layout.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <div class="page_wrapper">
        <div class="backtotop">
            <a href="#" class="scroll">
              <i class="fa-solid fa-arrow-up"></i>
            </a>
          </div>

          <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <main class="page_content">
            <?php echo $__env->yieldContent('content'); ?>
          </main>
          <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH E:\Ansh\psychotherapist\Template\Sakshi-Laravel-Medical-Website\handle-with-ease\resources\views/layout/master.blade.php ENDPATH**/ ?>