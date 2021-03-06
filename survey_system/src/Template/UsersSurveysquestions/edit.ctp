<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersSurveysquestion $usersSurveysquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usersSurveysquestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usersSurveysquestion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users Surveysquestions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersSurveysquestions form large-9 medium-8 columns content">
    <?= $this->Form->create($usersSurveysquestion) ?>
    <fieldset>
        <legend><?= __('Edit Users Surveysquestion') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('question_id');
            echo $this->Form->control('answer');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
