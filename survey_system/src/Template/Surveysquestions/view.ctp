<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Surveysquestion $surveysquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Surveysquestion'), ['action' => 'edit', $surveysquestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Surveysquestion'), ['action' => 'delete', $surveysquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveysquestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Surveysquestions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Surveysquestion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveysquestions view large-9 medium-8 columns content">
    <h3><?= h($surveysquestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Survey') ?></th>
            <td><?= $surveysquestion->has('survey') ? $this->Html->link($surveysquestion->survey->title, ['controller' => 'Surveys', 'action' => 'view', $surveysquestion->survey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer A') ?></th>
            <td><?= h($surveysquestion->answer_A) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer B') ?></th>
            <td><?= h($surveysquestion->answer_B) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer C') ?></th>
            <td><?= h($surveysquestion->answer_C) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer D') ?></th>
            <td><?= h($surveysquestion->answer_D) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($surveysquestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer Type') ?></th>
            <td><?= $this->Number->format($surveysquestion->answer_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($surveysquestion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($surveysquestion->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($surveysquestion->question)); ?>
    </div>
</div>
