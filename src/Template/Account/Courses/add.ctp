<?php $url = $this->Url->build('/')?>
 
    <!--====== COURSES PART START ======-->
    <style>.form-group {
    margin: 5px!important; 
}</style>
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
 <div class="container">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($course,['class'=>'form form-horizontal','type'=>"file"]); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Course'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Image') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('image',["type"=>"file",'class'=>'form-control','empty' => true,'label' => false,'div'=>false,"required"]);
			?>
	</div>
	</div>		
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('description',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Objective') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('objective',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Duration') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('duration',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'min'=>1,'max'=>100]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Total Video Time') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('total_video_time',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
					
					
		<div class="form-group row">		
			<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			</div>
		</div>					
					
				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('is_active',["type"=>"radio",'options' =>[1=>"YES",0=>"NO"],'class'=>'form-control','empty' => false,'label' => false,'div'=>false]);
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
</section>