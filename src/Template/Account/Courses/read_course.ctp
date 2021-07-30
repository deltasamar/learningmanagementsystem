 <?php $url = $this->Url->build('/')?>
  <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?=$url?>client_template/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?=$course->name?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
<section id="courses-part" class="pt-120 pb-120 gray-bg" ng-app="courseListApp" ng-controller="courseListController">
<div class="container">
<div class="row">

<div class="col-lg-4">
<p><strong><u>Your Course</u></strong></p>

<p style="cursor:pointer" ng-repeat="c in courseData" ng-click="openData(c)">{{c.name}} - <b>{{c.content_type==1?"PDF":"Video"}}</b></p>

</div>
<div class="col-lg-8">
<div ng-if="content_type==1">
<object data="{{url}}" type="application/pdf" width="800" height="700"></object>

</div>

<div ng-if="content_type==2">
  
<object data="{{url}}"  width="500" height="300">
</object>
</div>

</div>

</div>
</div>
</section>
<script>
var apiBaseUrl ='<?=$this->Url->build("/account/courses");?>';
	var courseId='<?=$course->id?>';	
	</script>
   <?=$this->Html->script(['angular-1.8.2/angular.min.js','angular-1.8.2/angular-sanitize.min','angular-1.8.2/angular-animate','courseRead'],['block'=>'scriptBottom']);?>