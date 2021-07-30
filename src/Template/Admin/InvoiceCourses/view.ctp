<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Invoice Course'), ['action' => 'edit', $invoiceCourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice Course'), ['action' => 'delete', $invoiceCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceCourse->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="invoiceCourses view col-lg-10 col-md-9 columns">
    <h2><?= h($invoiceCourse->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Invoice') ?></h6>
                    <p><?= $invoiceCourse->has('invoice') ? $this->Html->link($invoiceCourse->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoiceCourse->invoice->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $invoiceCourse->has('user') ? $this->Html->link($invoiceCourse->user->name, ['controller' => 'Users', 'action' => 'view', $invoiceCourse->user->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($invoiceCourse->id) ?></p>
                    <h6 class="subheader"><?= __('Gross Price') ?></h6>
                    <p><?= $this->Number->format($invoiceCourse->gross_price) ?></p>
                    <h6 class="subheader"><?= __('Discount') ?></h6>
                    <p><?= $this->Number->format($invoiceCourse->discount) ?></p>
                    <h6 class="subheader"><?= __('Net Price') ?></h6>
                    <p><?= $this->Number->format($invoiceCourse->net_price) ?></p>
                    <h6 class="subheader"><?= __('Invoice No') ?></h6>
                    <p><?= $this->Number->format($invoiceCourse->invoice_no) ?></p>
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
                    <td>  <p><?= h($invoiceCourse->create_date) ?></p></td>
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
