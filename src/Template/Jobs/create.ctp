<div class="head">
   <h1>Create your Job:</h1>
</div>
<div class="formcontainer">
   <?php
      echo $this->Form->create("Jobs", ['url' => ['action' => 'add']]);
      echo $this->Form->input('name');
      echo "<label for='description'>Job Descrition:</label>";
      echo $this->Form->textarea('description');
      echo $this->Form->input('email');
      echo "<p>Please enter your email address to get the link to edit your job.</p>";
      echo $this->Form->Submit('Create');
      echo $this->Form->end();
   ?>
</div>>