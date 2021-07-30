<section id="courses-part" class="pt-120 pb-120 gray-bg" ng-app="courseListApp" ng-controller="courseListController">
<div class="container">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table" ng-show="displayList">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Course Content'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right">
						<a href="javascript:void(0)" ng-click="add()" class = 'btn  btn-default'><span class="fa fa-plus"></span></a>
						</div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                
                <th>Content Type</th>
               
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <tr ng-repeat="c in courseData">
                <td>{{$index+1}}</td>
                <td>
                   {{c.name}}
                </td>
            <td>{{c.content_type==1?"Pdf":"Video"}}</td>
                
                
                    <td class="actions">
                    <a href="javascript:void(0)" ng-click="edit(c)"><span class="fa fa-edit"></span></a>
                </td>
            </tr>

       
        </tbody>
        </table>
    </div>
	
	
            </div>
        </div>
    </div>
	 </div>
    </div>
</section>								   
 <div class="row" ng-show="!displayList">
       <form method="post"  accept-charset="utf-8" enctype='multipart/form-data' validate="validate" name="contentFrm" id="contentFrm"
                              data-ng-submit="saveData($event);">
   
      <div class="form-body">
	                    		<h4 class="form-section">Add/Edit </h4>
       
	
		
		<div class="form-group row">		
				<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','ng-model'=>'contentAddData.name','empty' => true,'label' => false,'div'=>false]);
			?>
			</div>
		</div>
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Content Type') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('content_type',['options'=>['1'=>"PDF","2"=>"Video"],'class'=>'form-control',"ng-model"=>"contentAddData.content_type",'empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Content Url') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('content_url',["type"=>'file','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('description',["ng-model"=>"contentAddData.description",'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			  	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
	<button class = 'btn btn-default' type="button" ng-click="displayList=true">cancel</button>
    <?= $this->Form->end() ?>
      </div>
     
    </div>
  </div>

</div>
</div>
</section>	
<script>
var apiBaseUrl ='<?=$this->Url->build("/account/courses");?>';
	var courseId='<?=$course->id?>';	
		</script>
   <?=$this->Html->script(['angular-1.8.2/angular.min.js','angular-1.8.2/angular-sanitize.min','angular-1.8.2/angular-animate','courseContentListController'],['block'=>'scriptBottom']);?>