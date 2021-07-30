<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * Slightly modified by Òscar Casajuana for the twbs-cake-plugin
 * also under the MIT license.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
$pk = "\${$singularVar}->{$primaryKey[0]}";
%>
 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($<%= $singularVar %>,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('<%= $singularHumanName %>'), ['action' => 'index']) ?> <?= __('<%= Inflector::humanize($action) %>') ?> </h4>
       


<%
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            } %>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<%= "<%= __('" . Inflector::humanize($field) . "') %>" %></label>
			<div class="col-sm-9">
			<?php 
			<%
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
%>			
			
		
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>,'class'=>'form-control' 'empty' => true,'label' => false,'div'=>false
		]);
			?>

	</div>
	</div>
				
<%
                continue; 
				} else {
%>

            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
<%
              continue;
			  }
				 
			}
               
            if (!in_array($field, ['create_date', 'modified', 'updated','modify_date','is_active','is_deleted','photo','is_map_view','registration_date'])) {
%>
            echo $this->Form->input('<%= $field %>',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
<%		 continue;
            }
			if (in_array($field, ['create_date', 'modified', 'updated','modify_date'])) {
%>
            echo $this->Form->input('<%= $field %>',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
<%		 continue;
            }
			if (in_array($field, ['is_active','is_deleted','is_map_view'])) {
%>														?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="<%= $field %>" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="<%= $field %>">
																
			<label class="onoffswitch-label" for="<%= $field %>">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
	</div>
	</div>			
<%		 continue;
            }
			if (in_array($field, ['photo','image','user_image'])) {
%>
            echo $this->Form->input('<%= $field %>',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
<%		 continue;
            }
			%>
						
			<%
			 
        
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
            echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>,'label' => false]);
				?>
	</div>
	</div>			
<%
            }
			 
            }
			}
			%>
			
			<%
        
%>
       	
   
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