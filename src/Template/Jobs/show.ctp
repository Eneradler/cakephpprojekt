<div class="head">
  <h1>Your job:</h1>
</div>
<div class="main">
  <h3>Job id:</h3>
  <p><?php echo $job->id; ?></p>
  <h3>Job title:</h3>
  <p><?php echo $job->name; ?></p>
  <h3>Job description</h3>
  <p><?php echo $job->description; ?></p>
  <?php echo $this->Html->link('Home', ['controller' => 'Jobs', 'action' => 'index']);?>
</div>