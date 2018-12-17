<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suburb[]|\Cake\Collection\CollectionInterface $suburb
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Suburb'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suburb Configuration'), ['controller' => 'SuburbConfiguration', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suburb Configuration'), ['controller' => 'SuburbConfiguration', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Handylinks'), ['controller' => 'Handylinks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Handylink'), ['controller' => 'Handylinks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments Notifications Queue'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payments Notifications Queue'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phonebook'), ['controller' => 'Phonebook', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phonebook'), ['controller' => 'Phonebook', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Streets'), ['controller' => 'Streets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Street'), ['controller' => 'Streets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suburb index large-9 medium-8 columns content">
    <h3><?= __('Suburb') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('configuration_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suburb as $suburb): ?>
            <tr>
                <td><?= $this->Number->format($suburb->id) ?></td>
                <td><?= h($suburb->name) ?></td>
                <td><?= $suburb->has('suburb_configuration') ? $this->Html->link($suburb->suburb_configuration->name, ['controller' => 'SuburbConfiguration', 'action' => 'view', $suburb->suburb_configuration->id]) : '' ?></td>
                <td><?= $suburb->has('status') ? $this->Html->link($suburb->status->id, ['controller' => 'Statuses', 'action' => 'view', $suburb->status->id]) : '' ?></td>
                <td><?= h($suburb->created) ?></td>
                <td><?= h($suburb->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $suburb->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suburb->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suburb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suburb->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
