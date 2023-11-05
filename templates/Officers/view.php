<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Officer $officer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Officer'), ['action' => 'edit', $officer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Officer'), ['action' => 'delete', $officer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Officers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Officer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="officers view content">
            <h3><?= h($officer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($officer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($officer->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telp') ?></th>
                    <td><?= h($officer->telp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $officer->has('level') ? $this->Html->link($officer->level->level, ['controller' => 'Levels', 'action' => 'view', $officer->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($officer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($officer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($officer->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Responses') ?></h4>
                <?php if (!empty($officer->responses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Respon Date') ?></th>
                            <th><?= __('Respon') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Officer Id') ?></th>
                            <th><?= __('Report Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($officer->responses as $responses) : ?>
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
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
