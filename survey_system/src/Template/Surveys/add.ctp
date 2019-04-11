
<div class="page-bar">
        <ul class="page-breadcrumb">
                <li>
                        <i class="icon-layers"></i>
                         <span>Survey Add</span>
                        <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">
                        <?php echo $this->Html->link('Survey', array('controller' => 'surveys', 'action' => 'index')); ?>
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
            
            <h4 class="panel-title">Add Survey</h4>
        </div>
        <?php echo $this->Form->create('Survey', array('class' => 'form-horizontal form-bordered', 'novalidate', 'id'=>'add')); ?>

        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
                <label class="col-sm-3 control-label">Title<span class="asterisk">*</span></label>
                <div class="col-sm-6">
                    <?= $this->Form->control('title', array('placeholder' => 'Enter Title', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
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
echo $this->Html->script(array('surveys'), array('block' => 'scriptBottom', 'inline' => false));
?>
