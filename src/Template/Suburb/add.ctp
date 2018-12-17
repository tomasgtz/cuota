<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suburb $suburb
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Suburb'), ['action' => 'index']) ?></li>
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
<div class="suburb form large-9 medium-8 columns content">
    <?= $this->Form->create($suburb) ?>
    <fieldset>
        <legend><?= __('Add Suburb') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('configuration_id', ['options' => $suburbConfiguration]);
            echo $this->Form->control('status_id', ['options' => $statuses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
