<div class="head">
  <h1>Your added job</h1>
</div>
<div class="main">
  <p>Edit the job:</p>
  <?php
      echo $this->Form->create($job);
      echo $this->Form->control('name');
      echo $this->Form->control('description');
      echo $this->Form->Submit('Edit');
      
      echo $this->Form->end();
  ?>
  <p>Or delete the job:</p>
  <?php echo $this->Html->link('Delete', ['controller' => 'Jobs', 'action' => 'delete', $job->id, $job->token], ['confirm' => 'Are you sure?']);?>
      
</div>
