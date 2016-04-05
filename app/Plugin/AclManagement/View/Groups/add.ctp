<div class="groups form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Group', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">New Group</li>
</ul>
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
            echo $this->Form->input('name', array('div'=>'clearfix',
                'before'=>'<label>'.__('Name').'</label><div class="input">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'xlarge'));
	?>
        <div class="actions">            
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn primary', 'div'=>false, 'disabled'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
