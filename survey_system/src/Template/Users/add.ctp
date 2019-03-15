<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                        <i class="fa fa-user"></i>
                         <span>User Add</span>
                        <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">
                        <?php echo $this->Html->link('User', array('controller' => 'users', 'action' => 'index')); ?>
                        <i class="fa fa-angle-right"></i>
                </li>
        </ul>
					
</div>
<div class='panel-body'><?php 
echo $this->Flash->render();
?></div>
<div class="contentpanel">   
    <br>
    <!-- content goes here... -->
    <div class="panel panel-default">

        <div class="panel-heading">
            
            <h4 class="panel-title">Add User</h4>
        </div>
        <?php echo $this->Form->create('User', array('class' => 'form-horizontal form-bordered', 'novalidate', 'id'=>'addUser')); ?>

        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
                <label class="col-sm-3 control-label">Username<span class="asterisk">*</span></label>
                <div class="col-sm-6">
                    <?= $this->Form->control('username', array('placeholder' => 'Enter Username', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password<span class="asterisk">*</span></label>
                <div class="col-sm-6">
                    <?= $this->Form->control('password', array('placeholder' => 'Enter Password', 'label' => false, 'class' => 'form-control')); ?>                    
                </div>
            </div>
            <?= $this->Form->hidden('role', array('value' => 'user')); ?>
            <?= $this->Form->hidden('pass', array('value' => '')); ?>  
            
        </div><!-- panel-body -->
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <?= $this->Form->button('Add', array('class'=>'btn btn-primary', 'id'=>'addPageBtn', 'data-loading-text'=>"Please Wait...")); ?>
                    &nbsp;
                    <?php echo $this->Html->link('Cancel', array('action'=>'index'), array('class'=>'btn btn-default')); ?>
                   
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<?php
echo $this->Html->script(array('users'), array('block' => 'scriptBottom', 'inline' => false));
?>
