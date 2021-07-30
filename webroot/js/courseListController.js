
var courseListApp = angular.module('courseListApp', ['infinite-scroll']);
courseListApp.controller('courseListController', ["$scope", "$http", '$timeout', function ($scope, $http, $timeout) {
        $scope.loadingData = false;
        $scope.page = 1;
        $scope.nextPage = false;
        $scope.courseData=[];
        $scope.showTotal=0;
		$scope.totalRecord=0;
        $scope.courseDataCallFirst = function () {
            $scope.lastpage = 0;
            $scope.page = 0;
			console.log($scope.searchData);
            $http.post(apiBaseUrl + '/getCourseList?page=1', {"search":$scope.searchData}
            ).then(function (response) {
                
               
                   
                    $scope.courseData = response.data.data;
                    $scope.page = response.data.paging.page+1;
                    $scope.nextPage = response.data.paging.nextPage;
					$scope.showTotal=response.data.paging.end;
					$scope.totalRecord=response.data.paging.count;
                    $scope.loadingContinue = false;
                    $scope.loadingData = false;
                    $timeout(function(){$scope.loadd=true;},10000);
            });
        };
		$scope.courseDataCallFirst();
        $scope.nextPageDataLoad = function () {
            console.log($scope.page);
            if ($scope.loadingContinue) {
                return true;
            }

            if (!$scope.nextPage) {
                $scope.loadingContinue = false;
                $scope.loadingData = false;
                return true;
            }
			$scope.loadingData = true;
            $scope.loadingContinue = true;
           $http.post(apiBaseUrl + '/getCourseList?page='+$scope.page, {"search":$scope.searchData}
            ).then(function (response) {
                if (response.data.paging.page == 1) {
                    $scope.courseData = resp.data.data;
                } else {
                    $scope.courseData = $scope.courseData.concat(response.data.data);
                }
                $scope.page = response.data.paging.page+1;
                $scope.nextPage = response.data.paging.nextPage;
				$scope.showTotal=response.data.paging.end;
				$scope.totalRecord=response.data.paging.count;
                $scope.loadingContinue = false;
                $scope.loadingData = false;


            });
        };
      $scope.search=function(){
		  $scope.courseDataCallFirst();
	  };
         }]);

