<?php $__env->startSection('content'); ?><h1 id="installation">Installation</h1>

<p>This is a starter template for creating a beautiful, customizable documentation site for your project with minimal effort. You’ll only have to change a few settings and you’re ready to go.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>