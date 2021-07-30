   <?php $url = $this->Url->build('/')?>
  <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(<?=$url?>client_template/images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>My Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== COURSES PART START ======-->
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg" ng-app="courseListApp" ng-controller="courseListController">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                           
                            <li class="nav-item">Showning {{showTotal}} 0f {{totalRecord}} Results</li>
                        </ul> 
						
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
						
                    </div>-->  <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row" infinite-scroll='nextPageDataLoad()' infinite-scroll-disabled='busy' infinite-scroll-distance='1'>
                        <div class="col-lg-4 col-md-6" ng-repeat="c in courseData" ng-cloak>
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="{{c.image}}" alt="Course">
                                    </div>
                                   
                                </div>
                                <div class="cont">
                                   
                                    <a href="<?=$url?>courses/view/{{c.slug}}"><h4>{{c.name}}</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="{{c.image}}" alt="teacher"></a>
                                        </div>
                                        <div class="name">
                                            <a href="<?=$url?>/account/courses/readCourse/{{c.slug}}""><h6>Learn Now</h6></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                      </div> <!-- row -->
                </div>
                
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                     <div class="text-center" ng-show='busy'><span class=" text-center text-primary" style="position:fixed;margin-top: 10%;"><i class='fa fa-circle-o-notch fa-spin fa-3x'></i> </span></div> <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>
	<script>var apiBaseUrl ='<?=$this->Url->build("/account/courses");?>';
		
		</script>
   <?=$this->Html->script(['angular-1.8.2/angular.min.js','angular-1.8.2/ng-infinite-scroll.min','courseListController'],['block'=>'scriptBottom']);?>