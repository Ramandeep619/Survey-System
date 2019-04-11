<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Surveysquestion $surveysquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $surveysquestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $surveysquestion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Surveysquestions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Surveys'), ['controller' => 'Surveys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Survey'), ['controller' => 'Surveys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="surveysquestions form large-9 medium-8 columns content">
    <?= $this->Form->create($surveysquestion) ?>
    <fieldset>
        <legend><?= __('Edit Surveysquestion') ?></legend>
        <?php
            echo $this->Form->control('survey_id', ['options' => $surveys]);
            echo $this->Form->control('question');
            echo $this->Form->control('answer_type');
            echo $this->Form->control('answer_A');
            echo $this->Form->control('answer_B');
            echo $this->Form->control('answer_C');
            echo $this->Form->control('answer_D');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
