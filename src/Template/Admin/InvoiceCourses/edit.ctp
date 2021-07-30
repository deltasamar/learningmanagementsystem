 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($invoiceCourse,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Invoice Course'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Invoice Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('invoice_id', ['options' => $invoices,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('User Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Gross Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('gross_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Discount') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('discount',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Net Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('net_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Create Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('create_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Invoice No') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('invoice_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			       	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>