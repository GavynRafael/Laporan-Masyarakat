<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 * @var \Cake\Collection\CollectionInterface|string[] $officers
 * @var \Cake\Collection\CollectionInterface|string[] $reports
 */
?>

<section class="content-header">
    <h1>
        Officer
        <small><?php echo __('edit'); ?></small>
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
                <?php echo $this->Form->create($officer, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('telp');
                    echo $this->Form->control('level_id', ['options' => $levels]);
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