<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit User</li>
</ul>
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
            echo $this->Form->input('id');
            echo $this->Form->input('name', array('div'=>'clearfix',
                'before'=>'<label>'.__('Name').'</label><div class="input">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'xlarge'));
            echo $this->Form->input('email', array('div'=>'clearfix', 'readonly'=>true,
                'before'=>'<label>'.__('Email').'</label><div class="input">',
                'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'xlarge'));

            echo $this->Form->input('password', array('div'=>'clearfix',
                'before'=>'<label>'.__('Password').'</label><div class="input">',
                'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'xlarge'));
            echo $this->Form->input('password2', array('div'=>'clearfix', 'type'=>'password',
                'before'=>'<label>'.__('Confirm Password').'</label><div class="input">',
                'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'xlarge'));

            echo $this->Form->input('group_id', array('div'=>'clearfix',
                'before'=>'<label>'.__('Group').'</label><div class="input">',
                'after'=>'</div>','label'=>false, 'class'=>'xlarge'));
            echo $this->Form->input('status', array('div'=>'clearfix',
                'before'=>'<label>'.__('Status').'</label><div class="input">',
                'after'=>'</div>','label'=>false, 'class'=>''));
        ?>
        <div class="actions">
            <?php 
             //$disabled = ($this->data['User']['id'] == 1 || $this->data['User']['id'] == 2) ? true : false;
             //if($disabled) echo "<p>Edit `Admin` user temporarily close for demo.Sorry for any inconvenience.</p>";
             echo $this->Form->submit(__('Submit'), array('class'=>'btn primary', 'div'=>false, 'disabled' =>false ));
?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>