<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="groups index">
	<table cellpadding="0" cellspacing="0" class="table table-hover">
	<thead>
	<tr>
                <th class="header"><?php echo $this->Paginator->sort('id');?></th>
                <th class="header"><?php echo $this->Paginator->sort('name');?></th>
                <th class="header"><?php echo $this->Paginator->sort('created');?></th>
                <th class="header"><?php echo $this->Paginator->sort('modified');?></th>
                <th class="header"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($groups as $group):
        ?>
	<tr>
            <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
            <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
            <td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
            <td>
            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $group['Group']['id']),array(
                'type'=>'button',
                'class'=>'btn btn-warning')
                 );
            ?>
            <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $group['Group']['id']),
                    array(
                'type'=>'button',
                'class'=>'btn btn-danger'), __('Esta seguro de eliminar # %s?', $group['Group']['id'])
                );
            ?>
            </td>
	</tr>
        <?php endforeach; ?>
	</tbody>
	</table>
	<?php echo $this->element('pagination');?>
</div></div>
