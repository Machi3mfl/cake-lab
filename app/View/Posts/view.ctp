<div class="posts view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Post', array('action'=>'home'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('View Post'); ?></li>
</ul>
	<table class="condensed-table">
	<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Body'); ?></th>
		<td>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Action'); ?></th>
		<td>
			<?php echo $this->Html->link('Edit', array('action'=>'edit', $post['Post']['id']));?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
