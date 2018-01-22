<div class="head">
	<h1>Welcome to simple job market!</h1>
</div>
<div class="main">
	<p>What would you like to do?</p>
	<ul>
		<li><?php echo $this->Html->link('See the list of the jobs', ['controller' => 'Jobs', 'action' => 'list']);?></li>
		<li><?php echo $this->Html->link('Create a new job', ['controller' => 'Jobs', 'action' => 'create']);?></li>
</div>