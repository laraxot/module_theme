<?php $__env->startSection('nav-toggle'); ?>
    <?php echo $__env->make('_nav.menu-toggle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<section class="container max-w-8xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block">
            <?php echo $__env->make('_nav.menu', ['items' => $page->navigation], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words pb-16 lg:pl-4" v-pre>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/staging.mediamonitor.it/laravel/Modules/Theme/docs/source/_layouts/documentation.blade.php ENDPATH**/ ?>