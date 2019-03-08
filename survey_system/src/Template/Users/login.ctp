<?php if($this->Flash->render()){ ?>
<div class="alert alert-danger"><?= $this->Flash->render() ?>
			<button class="close" data-close="alert"></button>
			<span>
			Invalid username or password, try again
                        </span>
		</div>
<?php } ?>
<?php echo $this->Form->create('User', array('id' => 'UserLoginForm', 'novalidate' => 'novalidate')); ?>
		<h3 class="form-title">Login to your account</h3>
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			
			<button type="submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		
	<?php echo $this->Form->end(); ?>

<?php //echo $this->Html->script(array('timezone', 'cookies'), array('inline'=>false));
