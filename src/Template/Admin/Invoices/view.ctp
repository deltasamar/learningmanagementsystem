<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Courses'), ['controller' => 'InvoiceCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Course'), ['controller' => 'InvoiceCourses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="invoices view col-lg-10 col-md-9 columns">
    <h2><?= h($invoice->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $invoice->has('user') ? $this->Html->link($invoice->user->name, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($invoice->id) ?></p>
                    <h6 class="subheader"><?= __('Gross Price') ?></h6>
                    <p><?= $this->Number->format($invoice->gross_price) ?></p>
                    <h6 class="subheader"><?= __('Discount') ?></h6>
                    <p><?= $this->Number->format($invoice->discount) ?></p>
                    <h6 class="subheader"><?= __('Net Price') ?></h6>
                    <p><?= $this->Number->format($invoice->net_price) ?></p>
                    <h6 class="subheader"><?= __('Invoice No') ?></h6>
                    <p><?= $this->Number->format($invoice->invoice_no) ?></p>
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
                    <td>  <p><?= h($invoice->create_date) ?></p></td>
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
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related InvoiceCourses') ?></h4>
    <?php if (!empty($invoice->invoice_courses)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Invoice Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Gross Price') ?></th>
                <th><?= __('Discount') ?></th>
                <th><?= __('Net Price') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Invoice No') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_courses as $invoiceCourses): ?>
            <tr>
                <td><?= h($invoiceCourses->id) ?></td>
                <td><?= h($invoiceCourses->invoice_id) ?></td>
                <td><?= h($invoiceCourses->user_id) ?></td>
                <td><?= h($invoiceCourses->gross_price) ?></td>
                <td><?= h($invoiceCourses->discount) ?></td>
                <td><?= h($invoiceCourses->net_price) ?></td>
                <td><?= h($invoiceCourses->create_date) ?></td>
                <td><?= h($invoiceCourses->invoice_no) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'view', $invoiceCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'edit', $invoiceCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'InvoiceCourses', 'action' => 'delete', $invoiceCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceCourses->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
