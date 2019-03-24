<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['id'=>'userForm']) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email_phone',['id'=>'email_phone']);
            echo $this->Form->control('name',['id'=>'name']);
            echo $this->Form->control('surname',['id'=>'surname']);
            echo $this->Form->control('address',['id'=>'address']);
            echo $this->Form->control('password',['id'=>'password']);
            echo $this->Form->control('confirm_password',['id'=>'comfirm_password']);
            echo $this->Form->control('profile_image',['id'=>'profile_image']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
