<div class="posts index">
	<h2><?php echo __('Results');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('title');?></th>
            <th><?php echo $this->Paginator->sort('body');?></th>
	</tr>
	<?php
	foreach ($results as $post): ?>
            <tr>
                <td><?php echo $post['Indexing']['title']; ?>&nbsp;</td>
                <td><?php echo $post['Indexing']['body']; ?></td>
            </tr>
        <?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Filter'); ?></h3>
        <?php echo $this->Form->create('Post');?>
	<ul>
		<li><?php echo $this->Form->input('keyword');?></li>
		<li><?php echo $this->Form->input('category_id');?></li>
		<li><?php echo $this->Form->input('submit', array('type'=>'submit', 'label'=>false));?></li>
	</ul>
        <?php echo $this->Form->end();?>
</div>