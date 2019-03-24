<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friend $friend
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Friends'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="friends form large-9 medium-8 columns content">
    <?= $this->Form->create($friend) ?>
    <fieldset>
        <legend><?= __('Add Friend') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['type' => 'hidden', 'value'=>$authUser]);
            echo $this->Form->control('budy_id', ['options' => $budies]);
            echo $this->Form->control('status', ['value'=>'Pending']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
