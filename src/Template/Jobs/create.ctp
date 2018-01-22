<div class="head">
   <h1>Create your Job:</h1>
</div>
<div class="formcontainer">
   <?php
      echo $this->Form->create($job);
      echo $this->Form->control('name');
      echo $this->Form->control('description');
      echo $this->Form->control('email');
      echo "<p>Please enter your email address to get the link to edit your job.</p>";
      echo $this->Form->Submit('Create');
      echo $this->Form->end();
   ?>
</div>
<br>
<p><?php echo $this->Html->link('Home', ['controller' => 'Jobs', 'action' => 'index']);?></p>