<table>
<?php  foreach($query as $queryItem):?>
    <tr>
        <td>
        	<?php echo $this->Html->link($queryItem->name, ['controller' => 'Jobs', 'action' => 'show', $queryItem->id]);?>
        </td>
        <td>
        	<?php echo $queryItem->id;?>
        </td>
    </tr>
<?php  endforeach?>
</table>
<a href="/create">Create new Job</a>
