<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersSurveysquestion $usersSurveysquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Surveysquestion'), ['action' => 'edit', $usersSurveysquestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Surveysquestion'), ['action' => 'delete', $usersSurveysquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersSurveysquestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Surveysquestions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Surveysquestion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersSurveysquestions view large-9 medium-8 columns content">
    <h3><?= h($usersSurveysquestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersSurveysquestion->has('user') ? $this->Html->link($usersSurveysquestion->user->id, ['controller' => 'Users', 'action' => 'view', $usersSurveysquestion->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersSurveysquestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question Id') ?></th>
            <td><?= $this->Number->format($usersSurveysquestion->question_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($usersSurveysquestion->answer)); ?>
    </div>
</div>
