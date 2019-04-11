<div class='panel-body'><?php 
echo $this->Flash->render();
?></div>
<div class="contentpanel">   
    <br>
    <!-- content goes here... -->
    <div class="panel panel-default">

        <div class="panel-heading">
            
            <h4 class="panel-title">Add Question</h4>
        </div>
        <?php echo $this->Form->create('User', array('class' => 'form-horizontal form-bordered', 'novalidate', 'id'=>'addQuestion')); ?>

        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
                <label class="col-sm-2 control-label">Survey<span class="asterisk">*</span></label>
                <div class="col-sm-10">
                <?php echo $this->Form->input('survey_id',array('type'=>'select','options'=>$surveys,'label' => false,'class' => 'form-control')); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Question<span class="asterisk">*</span></label>
                <div class="col-sm-10">
                    <?= $this->Form->textarea('question', array('placeholder' => 'Enter Question here', 'label' => false, 'class' => 'form-control', 'id' => 'question')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Answer Type</label>
                                
				<div class="md-radio-inline col-sm-10">
					<div class="md-radio">
						<input type="radio" id="ans_manual" value="1" name="answer_type" class="md-radiobtn" checked>
						<label for="ans_manual">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Answer Manual </label>
					</div>
					<div class="md-radio">
						<input type="radio" id="ans_rating" value="3" name="answer_type" class="md-radiobtn">
						<label for="ans_rating">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Answer Rating </label>
					</div>
					<div class="md-radio">
						<input type="radio" id="ans_option" value="2" name="answer_type" class="md-radiobtn">
						<label for="ans_option">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Answer Options </label>
					</div>
					<div class="md-radio">
						<input type="radio" id="ans_check" value="4" name="answer_type" class="md-radiobtn">
						<label for="ans_check">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Multiple Answers </label>
					</div>
				</div>
									
            </div>
          <div id="ans_options" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label">Option A<span class="asterisk">*</span></label>
                <div class="col-sm-4">					
                    <?= $this->Form->textarea('answer_A', array('placeholder' => 'Enter Option A', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <label class="col-sm-2 control-label">Option B<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('answer_B', array('placeholder' => 'Enter Option B', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Option C<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('answer_C', array('placeholder' => 'Enter Option C', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <label class="col-sm-2 control-label">Option D<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('answer_D', array('placeholder' => 'Enter Option D', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
          </div>
          <div id="ans_checks" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label">Option A<span class="asterisk">*</span></label>
                <div class="col-sm-4">					
                    <?= $this->Form->textarea('check_answer_A', array('placeholder' => 'Enter Option A', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <label class="col-sm-2 control-label">Option B<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('check_answer_B', array('placeholder' => 'Enter Option B', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Option C<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('check_answer_C', array('placeholder' => 'Enter Option C', 'label' => false, 'class' => 'form-control')); ?>
                </div>
                <label class="col-sm-2 control-label">Option D<span class="asterisk">*</span></label>
                <div class="col-sm-4">
                    <?= $this->Form->textarea('check_answer_D', array('placeholder' => 'Enter Option D', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
          </div>
            <?= $this->Form->hidden('role', array('value' => 'user')); ?>
            
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
echo $this->Html->script(array('question'), array('block' => 'scriptBottom', 'inline' => false));
?>

