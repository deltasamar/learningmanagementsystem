<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cart Courses'), ['controller' => 'CartCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Course'), ['controller' => 'CartCourses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="carts view col-lg-10 col-md-9 columns">
    <h2><?= h($cart->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $cart->has('user') ? $this->Html->link($cart->user->name, ['controller' => 'Users', 'action' => 'view', $cart->user->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($cart->id) ?></p>
                    <h6 class="subheader"><?= __('Gross Price') ?></h6>
                    <p><?= $this->Number->format($cart->gross_price) ?></p>
                    <h6 class="subheader"><?= __('Discount') ?></h6>
                    <p><?= $this->Number->format($cart->discount) ?></p>
                    <h6 class="subheader"><?= __('Net Price') ?></h6>
                    <p><?= $this->Number->format($cart->net_price) ?></p>
                    <h6 class="subheader"><?= __('Invoice No') ?></h6>
                    <p><?= $this->Number->format($cart->invoice_no) ?></p>
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
                    <td>  <p><?= h($cart->create_date) ?></p></td>
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
    <h4 class="subheader"><?= __('Related CartCourses') ?></h4>
    <?php if (!empty($cart->cart_courses)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cart Id') ?></th>
                <th><?= __('Courese Id') ?></th>
                <th><?= __('Gross Price') ?></th>
                <th><?= __('Discount') ?></th>
                <th><?= __('Net Price') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cart->cart_courses as $cartCourses): ?>
            <tr>
                <td><?= h($cartCourses->id) ?></td>
                <td><?= h($cartCourses->cart_id) ?></td>
                <td><?= h($cartCourses->courese_id) ?></td>
                <td><?= h($cartCourses->gross_price) ?></td>
                <td><?= h($cartCourses->discount) ?></td>
                <td><?= h($cartCourses->net_price) ?></td>
                <td><?= h($cartCourses->create_date) ?></td>
                <td><?= h($cartCourses->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CartCourses', 'action' => 'view', $cartCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CartCourses', 'action' => 'edit', $cartCourses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CartCourses', 'action' => 'delete', $cartCourses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartCourses->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
