<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Record[]|\Cake\Collection\CollectionInterface $records
 * @var \Cake\Collection\CollectionInterface|string[] $genres
 */
?>
<div class="records index content">
    <?= $this->Html->link(__('New Record'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Records') ?></h3>
    <div class="content">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
            <?php echo $this->Form->control('title'); ?>
            <div class="artist">
            <?php echo $this->Form->control('artist'); ?>
            </div>

            <div class="year">
            <?php  echo $this->Form->control('year_(_no_later_than_)', ['type' => 'number']); ?>
            </div>

            <div class="genre">
            <?php  echo $this->Form->control('genre', ['options' => $genres, 'empty' => "--Don't filter by genre--"]);
            ?>
            </div>
        </fieldset>
        <?= $this->Form->button(__('Search by above criteria')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('artist') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('genre_id') ?></th>
                    <th><?= $this->Paginator->sort('no_of_discs') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= h($record->title) ?></td>
                    <td><?= h($record->artist) ?></td>
                    <td><?= h($record->year) ?></td>
                    <td><?= $record->has('genre') ? $this->Html->link($record->genre->name, ['controller' => 'Genres', 'action' => 'view', $record->genre->id]) : '' ?></td>
                    <td><?= $this->Number->format($record->no_of_discs) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $record->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $record->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $record->id], ['confirm' => __('Are you sure you want to delete # {0}?', $record->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
