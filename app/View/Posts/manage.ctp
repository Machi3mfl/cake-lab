<div class="posts">
	<table cellpadding="0" cellspacing="0" class="zebra-striped">
	<tr>
			<th class="header"><?php echo $this->Paginator->sort('id');?></th>
			<th class="header"><?php echo $this->Paginator->sort('title');?></th>			
			<th class="header"><?php echo $this->Paginator->sort('created');?></th>			
			<th class="header center"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>		
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>		
		<td class="center">
			<span class="label white"><?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?></span>
			<span class="label white warning"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?></span>
			<span class="label white important">
			<?php 
			// $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); 
			?>
			<a href='#' onclick='alert("Delete function temporarily close for demo.Sorry for any inconvenience."); return false;'>Delete</a>
			</span>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<div class="pagination">
		<p>
		<?php echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));?>		</p>
		<ul>
		<?php
		echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'before'=>'', 'after'=>''));
		echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'next disabled'));
	?>
		</ul>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.asc').closest('th').addClass('headerSortDown');
		$('.desc').closest('th').addClass('headerSortUp');
	});	
</script>