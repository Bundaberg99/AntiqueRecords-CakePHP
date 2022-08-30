<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Record $record
 * @var \Cake\Collection\CollectionInterface|string[] $genres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Records'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="records form content">
            <?= $this->Form->create($record) ?>
            <fieldset>
                <legend><?= __('Add Record') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('artist');
                    echo $this->Form->control('year', ['type' => 'number']);
                    echo $this->Form->control('genre_id', ['options' => $genres]);
                    echo $this->Form->control('no_of_discs');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
