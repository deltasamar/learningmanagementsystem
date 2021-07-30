
var courseListApp = angular.module('courseListApp', ['ngAnimate', 'ngSanitize']);

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
		$scope.contentAddData={"name":"","content_type":1,"description":""};
		$scope.add =function(){
			$scope.contentAddData={"name":"","content_type":1,"description":""};
			$scope.displayList=false;
			$scope.UpdateId=0;
		}
		$scope.edit =function(data){
			$scope.contentAddData=data;
			$scope.UpdateId=data.id;
			$scope.displayList=false;
		}
		$scope.UpdateId=0;
        $scope.saveData = function (e) {
			
			var postData;
            var fileUploadData = $scope.myFileData;
            var formData = new FormData($('#contentFrm')[0]);

            if ($('input[type=file]')[0].files[0] != undefined) {
                formData.append('content_url', $('input[type=file]')[0].files[0]);
            }
			 formData.append('name', $scope.contentAddData.name);
			  formData.append('content_type', $scope.contentAddData.content_type);
			formData.append('course_id',courseId );
           $http.post(apiBaseUrl + '/addEditCourseContent/'+$scope.UpdateId, formData, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined
                }
            }).then(function (data, status, header, config) {
				if(data.data.success){
					$scope.courseContentLoad();
					$scope.displayList=true;
				}else{
					alert("error occurs");
				}
            });
        };
         }]);

