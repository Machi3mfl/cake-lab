<div class="col-md-8 col-md-offset-2 main">
<div class="users index">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
    <tr>
        <th class="header"><?php echo $this->Paginator->sort('id');?></th>
        <th class="header"><?php echo $this->Paginator->sort('email');?></th>
        <th class="header"><?php echo $this->Paginator->sort('group_id');?></th>
        <th class="header"><?php echo $this->Paginator->sort('created');?></th>
        <th class="header"><?php echo $this->Paginator->sort('status');?></th>
        <th class="header center"><?php echo __('Actions');?></th>
    </tr>
    <?php
    foreach ($users as $user): ?>
    <tr>
            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
            <td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
            <td>
                    <?php 
                    $adminRoleName = array('admin', 'administrator');
                    if(in_array(strtolower($user['Group']['name']), $adminRoleName)){//Admin
                        echo $this->Html->image('/acl_management/img/icons/tick_disabled.png');
                    }else{
                        echo '<span style="cursor: pointer">';
                        echo $this->Html->image('/acl_management/img/icons/allow-' . intval($user['User']['status']) . '.png',
                            array('onclick' => 'published.toggle("status-'.$user['User']['id'].'", "'.$this->Html->url('/acl_management/users/toggle/').$user['User']['id'].'/'.intval($user['User']['status']).'");',
                                  'id' => 'status-'.$user['User']['id']
                                ));
                        echo '</span>&nbsp;';
                    }
                    ?>
            </td>
            <td>
                <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id']),array(
                    'type'=>'button',
                    'class'=>'btn btn-success')
                    ); 
                ?>
                <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id']),array(
                    'type'=>'button', 
                    'class'=>'btn btn-warning')
                     ); 
                ?>
                <?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), 
                        array(
                    'type'=>'button', 
                    'class'=>'btn btn-danger'), __('Esta seguro de eliminar # %s?', $user['User']['id'])
                    ); 
                ?>
           </td>
    </tr>
    <?php endforeach; ?>
    </table>

    <?php echo $this->element('pagination');?>
</div>
</div>    
<script type="text/javascript">
    var published = {
        toggle : function(id, url){
            obj = $('#'+id).parent();
            $.ajax({
                url: url,
                type: "POST",
                success: function(response){
                    obj.html(response);
                }
            });
        }
    };
</script>