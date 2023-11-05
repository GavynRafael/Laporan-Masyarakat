<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citizen $citizen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Citizen'), ['action' => 'edit', $citizen->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Citizen'), ['action' => 'delete', $citizen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $citizen->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Citizens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Citizen'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="citizens view content">
            <h3><?= h($citizen->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($citizen->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($citizen->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telp') ?></th>
                    <td><?= h($citizen->telp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $citizen->has('level') ? $this->Html->link($citizen->level->level, ['controller' => 'Levels', 'action' => 'view', $citizen->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($citizen->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nik') ?></th>
                    <td><?= $this->Number->format($citizen->nik) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($citizen->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($citizen->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($citizen->reports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Report Date') ?></th>
                            <th><?= __('Report') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Citizen Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($citizen->reports as $reports) : ?>
                        <tr>
                            <td><?= h($reports->id) ?></td>
                            <td><?= h($reports->report_date) ?></td>
                            <td><?= h($reports->report) ?></td>
                            <td><?= h($reports->photo) ?></td>
                            <td><?= h($reports->status) ?></td>
                            <td><?= h($reports->created) ?></td>
                            <td><?= h($reports->modified) ?></td>
                            <td><?= h($reports->citizen_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
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
