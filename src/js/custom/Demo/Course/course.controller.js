/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('course', course);
    course.$inject = ['$log', 'courseService', '$stateParams', '$scope', '$state', 'SweetAlert'];
    function course($log, courseService, $stateParams, $scope, $state, SweetAlert) {
        var vm = this;
        $scope.loading=true;
        if ($stateParams.Id) {
            $scope.courseStatus = 'Edit Course';
            vm.courseData = courseService.selectedCourse($stateParams.Id)
                .then(function (response) {
                        $scope.courseDetails = response;
                        $scope.loading=false;
                    },
                    function (err) {
                        $scope.loading=false;
                        return false;
                    });
        } else {
            $scope.courseStatus = 'Add course';
        }
        $scope.submit = function (form) {
            if (form.$valid) {
                $scope.loading=true;
                if ($stateParams.Id) {
                    vm.course = courseService.editCourse($stateParams.Id, $scope.courseDetails)
                        .then(function (response) {
                                $state.go('app.course', {obj: 'Edited'});
                                $scope.loading=false;
                            },
                            function (err) {
                                $state.go('app.course', {obj: 'error'});
                                $scope.loading=false;
                            });
                } else {
                    vm.course = courseService.newCourse($scope.courseDetails)
                        .then(function (response) {
                                $state.go('app.course', {obj: 'Inserted'});
                                $scope.loading=false;
                            },
                            function (err) {
                                $state.go('app.course', {obj: 'error'});
                                $scope.loading=false;
                            });
                }
            }
        }
    }


})();


