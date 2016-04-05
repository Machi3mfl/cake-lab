<div class="posts form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Post', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Add Post'); ?></li>
</ul>
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('title', array('div'=>'clearfix',
					'before'=>'<label>'.__('Title').'</label><div class="input">',
					'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'xlarge'));
		echo $this->Form->input('body', array('div'=>'clearfix',
					'before'=>'<label>'.__('Body').'</label><div class="input">',
					'after'=>$this->Form->error('body', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'xxlarge'));
	?>
        <div class="actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>