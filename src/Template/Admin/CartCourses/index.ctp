<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Cart Course'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cart_id') ?></th>
                <th><?= $this->Paginator->sort('courese_id') ?></th>
                <th><?= $this->Paginator->sort('gross_price') ?></th>
                <th><?= $this->Paginator->sort('discount') ?></th>
                <th><?= $this->Paginator->sort('net_price') ?></th>
                <th><?= $this->Paginator->sort('create_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cartCourses as $cartCourse): ?>
            <tr>
                <td><?= $this->Number->format($cartCourse->id) ?></td>
                <td>
                    <?= $cartCourse->has('cart') ? $this->Html->link($cartCourse->cart->id, ['controller' => 'Carts', 'action' => 'view', $cartCourse->cart->id]) : '' ?>
                </td>
                <td><?= $this->Number->format($cartCourse->courese_id) ?></td>
                    <td><?= $this->Number->format($cartCourse->gross_price) ?></td>
                    <td><?= $this->Number->format($cartCourse->discount) ?></td>
                    <td><?= $this->Number->format($cartCourse->net_price) ?></td>
                <td><?= h($cartCourse->create_date) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-search"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $cartCourse->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $cartCourse->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $cartCourse->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>
</div>