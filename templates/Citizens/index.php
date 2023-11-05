<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Citizens

        <div class="pull-right"><?= $this->Html->link(__('New Citizen'), ['action' => 'add'], ['class' => 'btn btn-success btn-xs']) ?></div>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= __('List'); ?></h3>

                    <div class="box-tools">
                        <form action="<?= $this->Url->build(); ?>" method="POST">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?= __('Search'); ?>">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('nik') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('telp') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citizens as $key => $citizen) : ?>
                                <tr>
                                    <td><?= $this->Number->format($key+1) ?></td>
                                    <td><?= h($citizen->nik) ?></td>
                                    <td><?= h($citizen->name) ?></td>
                                    <td><?= h($citizen->username) ?></td>
                                    <td><?= h($citizen->telp) ?></td>
                                    <td><?= h($citizen->created) ?></td>
                                    <td><?= h($citizen->modified) ?></td>
                                    <td><?= $citizen->has('level') ? $this->Html->link($citizen->level->level, ['controller' => 'Levels', 'action' => 'view', $citizen->level->id]) : '' ?></td>
                                    <td class="actions text-right">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $citizen->id], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $citizen->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $citizen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $citizen->id), 'class' => 'btn btn-danger btn-xs']) ?>
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

