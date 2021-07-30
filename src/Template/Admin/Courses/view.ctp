<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="courses view col-lg-10 col-md-9 columns">
    <h2><?= h($course->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($course->name) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($course->slug) ?></p>
                    <h6 class="subheader"><?= __('Image') ?></h6>
                    <p><?= h($course->image) ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $course->has('user') ? $this->Html->link($course->user->name, ['controller' => 'Users', 'action' => 'view', $course->user->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Total Video Time') ?></h6>
                    <p><?= h($course->total_video_time) ?></p>
                    <h6 class="subheader"><?= __('Modify By') ?></h6>
                    <p><?= h($course->modify_by) ?></p>
                    <h6 class="subheader"><?= __('Is Deleted') ?></h6>
                    <p><?= h($course->is_deleted) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($course->id) ?></p>
                    <h6 class="subheader"><?= __('Duration') ?></h6>
                    <p><?= $this->Number->format($course->duration) ?></p>
                    <h6 class="subheader"><?= __('Rating') ?></h6>
                    <p><?= $this->Number->format($course->rating) ?></p>
                    <h6 class="subheader"><?= __('Number User Registered') ?></h6>
                    <p><?= $this->Number->format($course->number_user_registered) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= $this->Number->format($course->status) ?></p>
                    <h6 class="subheader"><?= __('Is Active') ?></h6>
                    <p><?= $this->Number->format($course->is_active) ?></p>
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
                    <td>  <p><?= h($course->create_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Modify Date') ?></th>
                    <td>  <p><?= h($course->modify_date) ?></p></td>
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
           
									 <tr>
                   <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($course->description)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Objective') ?></th>
                    <td><?= $this->Text->autoParagraph(h($course->objective)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
