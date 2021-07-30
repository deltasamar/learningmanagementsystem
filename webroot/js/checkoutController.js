
var checkoutApp = angular.module('checkoutApp', []);
checkoutApp.controller('checkoutController', ["$scope", "$http", '$timeout', function ($scope, $http, $timeout) {
        $scope.loadingData = false;
		$scope.cartData = [];
        $scope.loadData = function () {
            
			 $scope.loadingData = true;
            $http.post(apiBaseUrl + '/allCourseInCart', {}
            ).then(function (response) {
				$scope.cartData = response.data.data;
                   $scope.loadingData = false;
            });
        };
		$scope.loadData();
        $scope.removeCart= function(id){
			if(!confirm("are you want to delete course from cart?")){
				return false;
			}
			$http.post(apiBaseUrl + '/remove', {'id':id}
            ).then(function (response) {
				$scope.loadData();
            });
		};
		$scope.checkoutLoader=false;
      $scope.checkout= function(){
			$scope.checkoutLoader=true;
			$http.post(apiBaseUrl + '/checkout', {}
            ).then(function (response) {
				$scope.checkoutLoader=false;
				window.location.href=BaseUrl + '/account/courses/mycourse';
            });
		};
         }]);

