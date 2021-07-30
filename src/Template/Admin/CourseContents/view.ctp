<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Course Content'), ['action' => 'edit', $courseContent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course Content'), ['action' => 'delete', $courseContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courseContent->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Course Contents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course Content'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Course Contents'), ['controller' => 'CourseContents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Course Content'), ['controller' => 'CourseContents', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="courseContents view col-lg-10 col-md-9 columns">
    <h2><?= h($courseContent->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Parent Course Content') ?></h6>
                    <p><?= $courseContent->has('parent_course_content') ? $this->Html->link($courseContent->parent_course_content->name, ['controller' => 'CourseContents', 'action' => 'view', $courseContent->parent_course_content->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($courseContent->name) ?></p>
                    <h6 class="subheader"><?= __('Content Type') ?></h6>
                    <p><?= h($courseContent->content_type) ?></p>
                    <h6 class="subheader"><?= __('Content Url') ?></h6>
                    <p><?= h($courseContent->content_url) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($courseContent->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Creted Date') ?></th>
                    <td>  <p><?= h($courseContent->creted_date) ?></p></td>
					</tr>
/table>
					</div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $courseContent->is_deleted ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
</table>
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
                    <td><?= $this->Text->autoParagraph(h($courseContent->description)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CourseContents') ?></h4>
    <?php if (!empty($courseContent->child_course_contents)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Content Type') ?></th>
                <th><?= __('Content Url') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Creted Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($courseContent->child_course_contents as $childCourseContents): ?>
            <tr>
                <td><?= h($childCourseContents->id) ?></td>
                <td><?= h($childCourseContents->parent_id) ?></td>
                <td><?= h($childCourseContents->name) ?></td>
                <td><?= h($childCourseContents->content_type) ?></td>
                <td><?= h($childCourseContents->content_url) ?></td>
                <td><?= h($childCourseContents->description) ?></td>
                <td><?= h($childCourseContents->creted_date) ?></td>
                <td><?= h($childCourseContents->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CourseContents', 'action' => 'view', $childCourseContents->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CourseContents', 'action' => 'edit', $childCourseContents->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CourseContents', 'action' => 'delete', $childCourseContents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCourseContents->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
