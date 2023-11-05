<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */
?>
<section class="content-header">
    <h1>
        <?= __('Report') ?>
        <small><?= __('View'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link(__('Home'), ['action' => 'index']) ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?= __('Report Information'); ?></h3>
                </div>
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt scope="row"><?= __('Citizen') ?></dt>
                        <dd><?= $report->has('citizen') ? $this->Html->link($report->citizen->name, ['controller' => 'Citizens', 'action' => 'view', $report->citizen->id]) : '' ?></dd>
                        <dt scope="row"><?= __('Id') ?></dt>
                        <dd><?= $this->Number->format($report->id) ?></dd>
                        <dt scope="row"><?= __('Status') ?></dt>
                        <dd><?= $this->Number->format($report->status) ?></dd>
                        <dt scope="row"><?= __('Report Date') ?></dt>
                        <dd><?= h($report->report_date) ?></dd>
                        <dt scope="row"><?= __('Created') ?></dt>
                        <dd><?= h($report->created) ?></dd>
                        <dt scope="row"><?= __('Modified') ?></dt>
                        <dd><?= h($report->modified) ?></dd>
                    </dl>

                    <div class="text">
                        <strong><?= __('Report') ?></strong>
                        <blockquote><?= $this->Text->autoParagraph(h($report->report)); ?></blockquote>
                    </div>

                    <div class="text">
                        <strong><?= __('Photo') ?></strong>
                        <blockquote><?= $this->Html->image('photo/' . $report->photo, ['width' => '100px']); ?></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related Responses') ?></h3>
                </div>
                <div class="box-body">
                    <?php if (!empty($report->responses)) : ?>
                        <table class="table table-hover">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Response Date') ?></th>
                                <th><?= __('Response') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th><?= __('Officer Id') ?></th>
                                <th><?= __('Report Id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($report->responses as $responses) : ?>
                                <tr>
                                    <td><?= h($responses->id) ?></td>
                                    <td><?= h($responses->respon_date) ?></td>
                                    <td><?= h($responses->respon) ?></td>
                                    <td><?= h($responses->created) ?></td>
                                    <td><?= h($responses->modified) ?></td>
                                    <td><?= h($responses->officer_id) ?></td>
                                    <td><?= h($responses->report_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Responses', 'action' => 'view', $responses->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Responses', 'action' => 'edit', $responses->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Responses', 'action' => 'delete', $responses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responses->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>