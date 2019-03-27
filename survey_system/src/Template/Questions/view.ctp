<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Answer Option') ?></th>
            <td><?= h($question->answer_option) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer A') ?></th>
            <td><?= h($question->answer_A) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer B') ?></th>
            <td><?= h($question->answer_B) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer C') ?></th>
            <td><?= h($question->answer_C) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer D') ?></th>
            <td><?= h($question->answer_D) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer E') ?></th>
            <td><?= h($question->answer_E) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer Type') ?></th>
            <td><?= $this->Number->format($question->answer_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($question->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($question->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Question') ?></h4>
        <?= $this->Text->autoParagraph(h($question->question)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer Manual') ?></h4>
        <?= $this->Text->autoParagraph(h($question->answer_manual)); ?>
    </div>
</div>
