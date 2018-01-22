<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Utility\Security;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class JobsController extends AppController
{
   // main 
   public function index() {
    $this->render();
   }

   // show all jobs
   public function list() {
   	// get all jobs from DB
   	$jobs = TableRegistry::get('Jobs');
	$query = $jobs->find();
	// pass to view
    $this->set(["query" => $query]);
    $this->render("list");
  }

  // create a new job
  public function create() {
  	// connect to DB table
  	$jobs = TableRegistry::get('Jobs');
    // create new record
    $job = $jobs->newEntity();
    if ($this->request->is('post')) {
  		// get data from the form
  		$data = $this->request->data;
  		//create a token
  		$timeStr = str_replace("0.", "", microtime());
		$timeStr = str_replace(" ", "", $timeStr);
		$token = Security::hash($timeStr);
		// temporary realisation of validation, because implementation of validator
		// was not working in my code. I think the validation should be in model
  		if($data['email'] == ''){
  			$this->Flash->error(__('Please fill all fields.'));
  			return $this->redirect(array('action' => 'create'));
  		}
  		// set new record with values from the form
  		$job->name = $data['name'];
  		$job->description = $data['description'];
  		$job->token = $token;
  		// save the cecord
  		if ($jobs->save($job)) {
  			$this->Flash->success(__('Your job has been saved.'));
  			// create an url for this job
  			$id = $job->id;
  			$url= Router::url([
    			"controller" => "Jobs",
    			"action" => "edit",
    			$id,
    			$token,
    			'_full' => true
    		]);
  			// create email to be sent
  			$email = new Email();
  			// send email to the creator of a job
  			$email->from(['mistercake2018@gmail.com' => 'Job Market'])
    			  ->to($data['email'])
    			  ->subject('Edit your job')
    			  ->send($url);
  			return $this->redirect(array('action' => 'index'));
		}
		// error if the record was not saved
		$this->Flash->error(__('Unable to add your job.'));
    }
    // pass to view
    $this->set(['job' => $job]);
  	$this->render();
  }

  // show the job
  public function show($id){
  	// get the job
  	$jobs = TableRegistry::get('Jobs');
	$job = $jobs->get($id);
	// pass the job to view
 	$this->set(['job' => $job]);
 	$this->render('show');
  }

  // edit the job
  public function edit($id, $token) {
  		// get the job with specified id
  	  	$jobs = TableRegistry::get('Jobs');
		$job = $jobs->get($id);
		if ($this->request->is(['post', 'put'])) {
			// update the job
			$jobs->patchEntity($job, $this->request->data);
			// save the updated job
			if ($jobs->save($job)) {
            		$this->Flash->success(__('Your job has been updated.'));
            		return $this->redirect(['action' => 'index']);
        	}
        	$this->Flash->error(__('Unable to update your job.'));
		}
		// pass to view
		$this->set(['job' => $job]);
 		$this->render('edit');
  }
  
  // delete the job
  public function delete($id, $token) {
    $jobs = TableRegistry::get('Jobs');
	$job = $jobs->get($id);
    if ($jobs->delete($job)) {
        $this->Flash->success(__('The job has been deleted.'));
        return $this->redirect(['action' => 'index']);
    }

  }
}