
var courseListApp = angular.module('courseListApp', ['ngAnimate', 'ngSanitize']);
courseListApp.directive('pdf', function() {
    return {
        restrict: 'E',
        link: function(scope, element, attrs) {
            var url = scope.$eval(attrs.src);
			console.log(url)
            element.replaceWith('<object type="application/pdf" data="' + url + '"></object>');
        }
    };
});
courseListApp.directive('videoplay', function() {
    return {
        restrict: 'E',
        link: function(scope, element, attrs) {
            var url = scope.$eval(attrs.src);
            element.replaceWith('<object type="video/mp4" data="' + url + '"></object>');
        }
    };
});
courseListApp.controller('courseListController', ["$scope", "$http", '$timeout','$log','$sce', function ($scope, $http, $timeout,$log,$sce) {
        $scope.loadingData = false;
        $scope.displayList=true;
        $scope.courseData=[];
       
        $scope.courseContentLoad = function () {
            
			
            $http.post(apiBaseUrl + '/courseContent', {"id":courseId}
            ).then(function (response) {
                    $scope.courseData = response.data.data;
                    
            });
        };
		$scope.courseContentLoad();
		$scope.openData= function(data){
			console.log(data.content_url);
			$scope.url=$sce.trustAsResourceUrl(data.content_url);
			$scope.content_type=data.content_type;
			console.log($scope.url);
		};
         }]);

