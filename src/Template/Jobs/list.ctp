<div class="head">
  <h1>List of all jobs:</h1>
</div>
<div class="main">
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
  <?php echo $this->Html->link('Home', ['controller' => 'Jobs', 'action' => 'index');?>
</div>
