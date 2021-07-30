<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit User Course'), ['action' => 'edit', $userCourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Course'), ['action' => 'delete', $userCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userCourse->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List User Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userCourses view col-lg-10 col-md-9 columns">
    <h2><?= h($userCourse->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $userCourse->has('user') ? $this->Html->link($userCourse->user->name, ['controller' => 'Users', 'action' => 'view', $userCourse->user->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Course') ?></h6>
                    <p><?= $userCourse->has('course') ? $this->Html->link($userCourse->course->name, ['controller' => 'Courses', 'action' => 'view', $userCourse->course->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($userCourse->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($userCourse->create_date) ?></p></td>
					</tr>
/table>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
				 <div class="table-responsive">
        <table class="table">
           
				</table>
                </div>
            </div>
        </div>
    </div>

</div>
