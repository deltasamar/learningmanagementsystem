 <section id="courses-part" class="pt-120 pb-120 gray-bg" ng-app="checkoutApp" ng-controller="checkoutController">
        <div class="container">
	 <div class="row">	
<div class="col-sm-12 col-md-10 col-md-offset-1">
<table class="table table-hover">
<thead>
<tr>
<th>Course</th>
<th>Author</th>

<th class="text-center">Price</th>

<th> </th>
</tr>
</thead>
<tbody>
<tr ng-repeat="c in cartData[0].cart_courses">
<td class="col-sm-8 col-md-6">
{{c.course.name}}
</td>
<td class="col-md-1 text-left">{{c.user.name}}</td>

<td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-inr"></i>{{c.course.price}}</strong></td>

<td class="col-sm-1 col-md-1">
<button type="button" class="btn btn-danger" ng-click="removeCart(c.id)">
<span class="fa fa-remove"></span> Remove
</button></td>
</tr>

					


<tr ng-show="cartData[0].cart_courses.length>0">
<td>   </td>
<td>   </td>
<td>   </td>
<td>
<button type="button" class="btn btn-default">
<span class="fa fa-shopping-cart"></span> Continue Shopping
</button></td>
<td>
<button type="button" class="btn btn-success" ng-click="!checkoutLoader && checkout()" ng-disabled="checkoutLoader">
<span>{{!checkoutLoader?"Checkout":"Please wait.."}}</span> <span class="fa fa-play" ng-show="!checkoutLoader"></span>
</button></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</section>
<script>var apiBaseUrl ='<?=$this->Url->build("/carts");?>';
		var BaseUrl ='<?=$this->Url->build("/");?>';
		</script>
   <?=$this->Html->script(['angular-1.8.2/angular.min.js','checkoutController'],['block'=>'scriptBottom']);?>