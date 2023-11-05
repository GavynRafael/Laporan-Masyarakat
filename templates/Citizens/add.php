<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citizen $citizen
 * @var \Cake\Collection\CollectionInterface|string[] $levels
 */

use function PHPSTORM_META\type;

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Citizens
        <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
</section>


<!-- Main content -->
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
                <?php echo $this->Form->create($citizen, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->control('nik');
                    echo $this->Form->control('name');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('telp');
                    echo $this->Form->control('level_id', ['value' => 2, 'type' => 'hidden']);
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

<section class="content">
</section>