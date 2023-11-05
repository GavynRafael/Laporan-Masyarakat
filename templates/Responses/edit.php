<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 * @var string[]|\Cake\Collection\CollectionInterface $officers
 * @var string[]|\Cake\Collection\CollectionInterface $reports
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $response->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $response->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Responses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="responses form content">
            <?= $this->Form->create($response) ?>
            <fieldset>
                <legend><?= __('Edit Response') ?></legend>
                <?php
                    echo $this->Form->control('respon_date');
                    echo $this->Form->control('respon');
                    echo $this->Form->control('officer_id', ['options' => $officers]);
                    echo $this->Form->control('report_id', ['options' => $reports]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

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
        Citizens
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
                <?php echo $this->Form->create($citizen, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->control('nik');
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