<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Survey $survey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Survey'), ['action' => 'edit', $survey->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Survey'), ['action' => 'delete', $survey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $survey->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Surveys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Survey'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Surveysquestions'), ['controller' => 'Surveysquestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Surveysquestion'), ['controller' => 'Surveysquestions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="surveys view large-9 medium-8 columns content">
    <h3><?= h($survey->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($survey->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($survey->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Surveysquestions') ?></h4>
        <?php if (!empty($survey->surveysquestions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Survey Id') ?></th>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Answer Type') ?></th>
                <th scope="col"><?= __('Answer A') ?></th>
                <th scope="col"><?= __('Answer B') ?></th>
                <th scope="col"><?= __('Answer C') ?></th>
                <th scope="col"><?= __('Answer D') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($survey->surveysquestions as $surveysquestions): ?>
            <tr>
                <td><?= h($surveysquestions->id) ?></td>
                <td><?= h($surveysquestions->survey_id) ?></td>
                <td><?= h($surveysquestions->question) ?></td>
                <td><?= h($surveysquestions->answer_type) ?></td>
                <td><?= h($surveysquestions->answer_A) ?></td>
                <td><?= h($surveysquestions->answer_B) ?></td>
                <td><?= h($surveysquestions->answer_C) ?></td>
                <td><?= h($surveysquestions->answer_D) ?></td>
                <td><?= h($surveysquestions->created) ?></td>
                <td><?= h($surveysquestions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Surveysquestions', 'action' => 'view', $surveysquestions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Surveysquestions', 'action' => 'edit', $surveysquestions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Surveysquestions', 'action' => 'delete', $surveysquestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $surveysquestions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
