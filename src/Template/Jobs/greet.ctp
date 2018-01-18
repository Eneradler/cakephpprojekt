<table>
<?php  foreach($query as $queryItem)  :?>
    <tr>
        <td>
        <?php echo $queryItem->name;?>
        </td>
    </tr>
<?php  endforeach?>
</table>
