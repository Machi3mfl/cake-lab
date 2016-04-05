<style type="text/css">
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
        margin: 0;
    }
</style>
<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit User</li>
</ul>
<?php echo $this->Form->create('User');?>
	<fieldset class="col-md-6">
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
            echo $this->Form->input('id');
            echo $this->Form->input('name', array(
                'after'=> $this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'form-control')
            );
            echo $this->Form->input('email', array(
                'readonly'=>true,
                'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'form-control')
            );

            echo $this->Form->input('password', array(
                'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'form-control'));
            echo $this->Form->input('password2', array(
                'type' => 'password',
                'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'class'=>'form-control'));

            echo $this->Form->input('group_id', array('class'=>'form-control'));

            echo $this->Form->input('status', array('class'=>''));
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