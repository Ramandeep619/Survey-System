<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersQuestion $usersQuestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Question'), ['action' => 'edit', $usersQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Question'), ['action' => 'delete', $usersQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersQuestions view large-9 medium-8 columns content">
    <h3><?= h($usersQuestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersQuestion->has('user') ? $this->Html->link($usersQuestion->user->id, ['controller' => 'Users', 'action' => 'view', $usersQuestion->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $usersQuestion->has('question') ? $this->Html->link($usersQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $usersQuestion->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersQuestion->id) ?></td>
        </tr>
    </table>
</div>
