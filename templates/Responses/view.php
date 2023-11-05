<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Response $response
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Response'), ['action' => 'edit', $response->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Response'), ['action' => 'delete', $response->id], ['confirm' => __('Are you sure you want to delete # {0}?', $response->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Responses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Response'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="responses view content">
            <h3><?= h($response->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Officer') ?></th>
                    <td><?= $response->has('officer') ? $this->Html->link($response->officer->name, ['controller' => 'Officers', 'action' => 'view', $response->officer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Report') ?></th>
                    <td><?= $response->has('report') ? $this->Html->link($response->report->id, ['controller' => 'Reports', 'action' => 'view', $response->report->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($response->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Respon Date') ?></th>
                    <td><?= h($response->respon_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($response->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($response->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Respon') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($response->respon)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
