<div class="head">
  <h1>Your added job</h1>
</div>
<div class="main">
  <h3>Job Id</h3>
  <p><?php echo $query->id; ?></p>
  <h3>Title</h3>
  <p><?php echo $query->name; ?></p>
  <h3>Description</h3>
  <p><?php echo $query->description; ?></p>
  <?php
      echo $this->Form->create($query, ['url' => ['action' => 'edit']]);
      echo $this->Form->control('name');
      echo $this->Form->control('description');
      echo $this->Form->Submit('Edit');
      echo $this->Form->end();
  ?>


  <h3>Options:</h3>
  <?php echo $this->Html->link('Edit', ['controller' => 'Jobs', 'action' => 'edit', $query->id, $query->token]); ?>
  <?php echo $this->Html->link('Delete', ['controller' => 'Jobs', 'action' => 'delete', $query->id, $query->token]); ?>
</div>
