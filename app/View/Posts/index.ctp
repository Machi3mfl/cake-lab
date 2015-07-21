<div class="posts">
	<?php
	foreach ($posts as $post): ?>
	<h3><a href="<?php echo $this->Html->url("/posts/view/".$post['Post']['id']);?>"><?php echo h($post['Post']['title']); ?></a></h3>
	<p><?php echo h($post['Post']['body']); ?></p>
	<?php endforeach; ?>
</div>
	<div class="pagination">
		<ul>
		<?php
		echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'before'=>'', 'after'=>''));
		echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'next disabled'));
	?>
		</ul>
	</div>
	

<script type="text/javascript">
	$(document).ready(function(){
		$('.asc').closest('th').addClass('headerSortDown');
		$('.desc').closest('th').addClass('headerSortUp');
	});	
</script>