<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Suburb $suburb
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suburb'), ['action' => 'edit', $suburb->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suburb'), ['action' => 'delete', $suburb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suburb->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suburb'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suburb'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suburb Configuration'), ['controller' => 'SuburbConfiguration', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suburb Configuration'), ['controller' => 'SuburbConfiguration', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Amenities'), ['controller' => 'Amenities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amenity'), ['controller' => 'Amenities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Handylinks'), ['controller' => 'Handylinks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Handylink'), ['controller' => 'Handylinks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments Notifications Queue'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payments Notifications Queue'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phonebook'), ['controller' => 'Phonebook', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phonebook'), ['controller' => 'Phonebook', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Streets'), ['controller' => 'Streets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Street'), ['controller' => 'Streets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suburb view large-9 medium-8 columns content">
    <h3><?= h($suburb->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($suburb->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suburb Configuration') ?></th>
            <td><?= $suburb->has('suburb_configuration') ? $this->Html->link($suburb->suburb_configuration->name, ['controller' => 'SuburbConfiguration', 'action' => 'view', $suburb->suburb_configuration->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $suburb->has('status') ? $this->Html->link($suburb->status->id, ['controller' => 'Statuses', 'action' => 'view', $suburb->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($suburb->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($suburb->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($suburb->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($suburb->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Amenities') ?></h4>
        <?php if (!empty($suburb->amenities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->amenities as $amenities): ?>
            <tr>
                <td><?= h($amenities->id) ?></td>
                <td><?= h($amenities->suburb_id) ?></td>
                <td><?= h($amenities->name) ?></td>
                <td><?= h($amenities->description) ?></td>
                <td><?= h($amenities->status_id) ?></td>
                <td><?= h($amenities->created) ?></td>
                <td><?= h($amenities->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Amenities', 'action' => 'view', $amenities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Amenities', 'action' => 'edit', $amenities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Amenities', 'action' => 'delete', $amenities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($suburb->files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->files as $files): ?>
            <tr>
                <td><?= h($files->id) ?></td>
                <td><?= h($files->suburb_id) ?></td>
                <td><?= h($files->name) ?></td>
                <td><?= h($files->url) ?></td>
                <td><?= h($files->status_id) ?></td>
                <td><?= h($files->created) ?></td>
                <td><?= h($files->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Handylinks') ?></h4>
        <?php if (!empty($suburb->handylinks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->handylinks as $handylinks): ?>
            <tr>
                <td><?= h($handylinks->id) ?></td>
                <td><?= h($handylinks->suburb_id) ?></td>
                <td><?= h($handylinks->link) ?></td>
                <td><?= h($handylinks->description) ?></td>
                <td><?= h($handylinks->status_id) ?></td>
                <td><?= h($handylinks->created) ?></td>
                <td><?= h($handylinks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Handylinks', 'action' => 'view', $handylinks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Handylinks', 'action' => 'edit', $handylinks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Handylinks', 'action' => 'delete', $handylinks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $handylinks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related News') ?></h4>
        <?php if (!empty($suburb->news)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Visible From') ?></th>
                <th scope="col"><?= __('Visible Until') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created User Id') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->news as $news): ?>
            <tr>
                <td><?= h($news->id) ?></td>
                <td><?= h($news->suburb_id) ?></td>
                <td><?= h($news->title) ?></td>
                <td><?= h($news->description) ?></td>
                <td><?= h($news->image_url) ?></td>
                <td><?= h($news->visible_from) ?></td>
                <td><?= h($news->visible_until) ?></td>
                <td><?= h($news->status_id) ?></td>
                <td><?= h($news->created) ?></td>
                <td><?= h($news->created_user_id) ?></td>
                <td><?= h($news->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'News', 'action' => 'view', $news->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'News', 'action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'News', 'action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Payments Notifications Queue') ?></h4>
        <?php if (!empty($suburb->payments_notifications_queue)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col"><?= __('Email Address') ?></th>
                <th scope="col"><?= __('Sent Date') ?></th>
                <th scope="col"><?= __('No Retries') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->payments_notifications_queue as $paymentsNotificationsQueue): ?>
            <tr>
                <td><?= h($paymentsNotificationsQueue->id) ?></td>
                <td><?= h($paymentsNotificationsQueue->suburb_id) ?></td>
                <td><?= h($paymentsNotificationsQueue->title) ?></td>
                <td><?= h($paymentsNotificationsQueue->body) ?></td>
                <td><?= h($paymentsNotificationsQueue->sent) ?></td>
                <td><?= h($paymentsNotificationsQueue->email_address) ?></td>
                <td><?= h($paymentsNotificationsQueue->sent_date) ?></td>
                <td><?= h($paymentsNotificationsQueue->no_retries) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'view', $paymentsNotificationsQueue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'edit', $paymentsNotificationsQueue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentsNotificationsQueue', 'action' => 'delete', $paymentsNotificationsQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentsNotificationsQueue->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Phonebook') ?></h4>
        <?php if (!empty($suburb->phonebook)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->phonebook as $phonebook): ?>
            <tr>
                <td><?= h($phonebook->id) ?></td>
                <td><?= h($phonebook->suburb_id) ?></td>
                <td><?= h($phonebook->phone) ?></td>
                <td><?= h($phonebook->description) ?></td>
                <td><?= h($phonebook->status_id) ?></td>
                <td><?= h($phonebook->created) ?></td>
                <td><?= h($phonebook->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phonebook', 'action' => 'view', $phonebook->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phonebook', 'action' => 'edit', $phonebook->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phonebook', 'action' => 'delete', $phonebook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phonebook->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requests') ?></h4>
        <?php if (!empty($suburb->requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Requestor Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Stage Id') ?></th>
                <th scope="col"><?= __('Attended User Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->suburb_id) ?></td>
                <td><?= h($requests->requestor_id) ?></td>
                <td><?= h($requests->title) ?></td>
                <td><?= h($requests->description) ?></td>
                <td><?= h($requests->image_url) ?></td>
                <td><?= h($requests->stage_id) ?></td>
                <td><?= h($requests->attended_user_id) ?></td>
                <td><?= h($requests->status_id) ?></td>
                <td><?= h($requests->created) ?></td>
                <td><?= h($requests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Streets') ?></h4>
        <?php if (!empty($suburb->streets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->streets as $streets): ?>
            <tr>
                <td><?= h($streets->id) ?></td>
                <td><?= h($streets->suburb_id) ?></td>
                <td><?= h($streets->name) ?></td>
                <td><?= h($streets->status_id) ?></td>
                <td><?= h($streets->created) ?></td>
                <td><?= h($streets->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Streets', 'action' => 'view', $streets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Streets', 'action' => 'edit', $streets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Streets', 'action' => 'delete', $streets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Surveys') ?></h4>
        <?php if (!empty($suburb->surveys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Suburb Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Finish Date') ?></th>
                <th scope="col"><?= __('Created User Id') ?></th>
                <th scope="col"><?= __('Welcome Message') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suburb->surveys as $surveys): ?>
            <tr>
                <td><?= h($surveys->id) ?></td>
                <td><?= h($surveys->suburb_id) ?></td>
                <td><?= h($surveys->title) ?></td>
                <td><?= h($surveys->start_date) ?></td>
                <td><?= h($surveys->finish_date) ?></td>
                <td><?= h($surveys->created_user_id) ?></td>
                <td><?= h($surveys->welcome_message) ?></td>
                <td><?= h($surveys->description) ?></td>
                <td><?= h($surveys->status_id) ?></td>
                <td><?= h($surveys->created) ?></td>
                <td><?= h($surveys->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Surveys', 'action' => 'view', $surveys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Surveys', 'action' => 'edit', $surveys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Surveys', 'action' => 'delete', $surveys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
