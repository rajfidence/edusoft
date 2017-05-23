/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('Package', Package);
    Package.$inject = ['$log', 'packageService', '$stateParams', '$scope', '$state', 'SweetAlert'];
    function Package($log, packageService, $stateParams, $scope, $state, SweetAlert) {
        var vm = this;
        $scope.package={};
        $scope.selectedCourse={};
        $scope.selectedCourse.courses=[];
        $scope.courses=[];
        $scope.loading=true;
        vm.courseList = packageService.courseList()
            .then(function (response) {
                    $scope.courseList = response;
                    $scope.loading=false;
                },
                function (err) {
                    $scope.loading=false;
                    return false;
                });
        if ($stateParams.Id) {
            $scope.packageStatus = 'Edit Package';
            vm.packageData = packageService.selectedPackage($stateParams.Id)
                .then(function (response) {
                        $scope.package = response.package;
                        $scope.selectedCourse.courses = response.course;
                    },
                    function (err) {
                        return false;
                    });
        } else {
            $scope.packageStatus = 'Add Package';
        }
        $scope.submit = function (form) {
            if (form.$valid) {
                if ($stateParams.Id) {
                    vm.packageEdit = packageService.editPackage($stateParams.Id, $scope.package, $scope.selectedCourse.courses)
                        .then(function (response) {
                                $state.go('admin.packageList', {obj: 'Edited'});
                            },
                            function (err) {
                                $state.go('admin.packageList', {obj: 'error'});
                            });

                } else {
                    vm.packageAdd = packageService.newPackage($scope.package, $scope.selectedCourse.courses)
                        .then(function (response) {
                                $state.go('admin.packageList', {obj: 'Inserted'});
                            },
                            function (err) {
                                $state.go('admin.packageList', {obj: 'error'});
                            });
                }
            }
        }
    }


})();


