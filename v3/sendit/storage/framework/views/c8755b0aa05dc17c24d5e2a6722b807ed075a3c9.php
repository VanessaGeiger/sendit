<?php $__env->startSection('content'); ?>
        <section class="content-header">
            <h4>
                <?php echo e(isset($page_title) ? $page_title : "Einstellungen"); ?>

                <small><?php echo e(isset($page_description) ? $page_description : null); ?></small>
            </h4>
          <?php /*  <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>*/ ?>
        </section>

        <!-- Main content -->
        <section class="content">
<p>Hier kann man Sachen Einstellen, wie was weiß ich </p>
            <?php echo $__env->yieldContent('content'); ?>

        </section><!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>