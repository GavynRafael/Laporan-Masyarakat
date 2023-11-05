<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Response> $responses
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Responses

        <div class="pull-right"><?= $this->Html->link(__('New Response'), ['action' => 'add'], ['class' => 'btn btn-success btn-xs']) ?></div>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= __('Responses'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('respon_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('officer_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('report_id') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($responses as $response) : ?>
                                <tr>
                                    <td><?= $this->Number->format($response->id) ?></td>
                                    <td><?= h($response->respon_date) ?></td>
                                    <td><?= h($response->created) ?></td>
                                    <td><?= h($response->modified) ?></td>
                                    <td><?= $response->has('officer') ? $this->Html->link($response->officer->name, ['controller' => 'Officers', 'action' => 'view', $response->officer->id]) : '' ?></td>
                                    <td><?= $response->has('report') ? $this->Html->link($response->report->id, ['controller' => 'Reports', 'action' => 'view', $response->report->id]) : '' ?></td>
                                    <td class="actions text-right">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $response->id], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $response->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $response->id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->id), 'class' => 'btn btn-danger btn-xs']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>