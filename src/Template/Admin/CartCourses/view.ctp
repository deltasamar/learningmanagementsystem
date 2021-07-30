<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Cart Course'), ['action' => 'edit', $cartCourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart Course'), ['action' => 'delete', $cartCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartCourse->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['controller' => 'Carts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['controller' => 'Carts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="cartCourses view col-lg-10 col-md-9 columns">
    <h2><?= h($cartCourse->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Cart') ?></h6>
                    <p><?= $cartCourse->has('cart') ? $this->Html->link($cartCourse->cart->id, ['controller' => 'Carts', 'action' => 'view', $cartCourse->cart->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $cartCourse->has('user') ? $this->Html->link($cartCourse->user->name, ['controller' => 'Users', 'action' => 'view', $cartCourse->user->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($cartCourse->id) ?></p>
                    <h6 class="subheader"><?= __('Courese Id') ?></h6>
                    <p><?= $this->Number->format($cartCourse->courese_id) ?></p>
                    <h6 class="subheader"><?= __('Gross Price') ?></h6>
                    <p><?= $this->Number->format($cartCourse->gross_price) ?></p>
                    <h6 class="subheader"><?= __('Discount') ?></h6>
                    <p><?= $this->Number->format($cartCourse->discount) ?></p>
                    <h6 class="subheader"><?= __('Net Price') ?></h6>
                    <p><?= $this->Number->format($cartCourse->net_price) ?></p>
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
                    <td>  <p><?= h($cartCourse->create_date) ?></p></td>
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
