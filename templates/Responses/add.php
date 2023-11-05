<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 * @var \Cake\Collection\CollectionInterface|string[] $citizens
 */
?>
<section class="content-header">
    <h1>
        response
        <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
</section>



<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('Form'); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($response, ['role' => 'form', 'type' => 'file']); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->control('respon_date');
                    echo $this->Form->control('respon');
                    echo $this->Form->control('officer_id', ['options' => $officers]);
                    echo $this->Form->control('report_id', ['options' => $citizens]);

                    ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Submit')); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>