/**
 * Created by 3 Cube on 1/27/2016.
 */
/**=========================================================
 * Module: ADDNEWUSER.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('UserController', UserController)
        .directive("compareTo", compareTo);
    UserController.$inject = ['$rootScope', '$scope', '$state', '$stateParams', 'userService'];
    function UserController($rootScope, $scope, $state, $stateParams, userService) {
        var vm = this;
        $scope.selectedPackage = {};
        vm.today = function () {
            //vm.dt = new Date();
            vm.dt = '';
        };
        vm.today();

        vm.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        vm.format = 'dd-MM-yyyy';
        vm.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
            vm.opened = true;
        };

        vm.clear = function () {
            vm.dt = null;
        };
        vm.dtmax = new Date();

        if ($stateParams.Id) {
            $scope.packageStatus = 'Edit User';
            vm.userGet = userService.userGet()
                .then(function (response) {
                        $scope.user = response;
                        $scope.loading = false;
                    },
                    function (err) {
                        $scope.loading = false;
                        return false;
                    });
        } else {
            $scope.packageStatus = 'Add User';
        }

        $scope.submit = function (form) {
            if (form.$valid) {
                if ($stateParams.Id) {
                    vm.userEdit = userService.editPackage($stateParams.Id, $scope.package, $scope.selectedPackage.packages)
                        .then(function (response) {
                                $state.go('admin.packageList', {obj: 'Edited'});
                            },
                            function (err) {
                                $state.go('admin.packageList', {obj: 'error'});
                            });
                } else {
                    vm.userAdd = userService.newPackage($scope.package, $scope.selectedCourse.courses)
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

    compareTo.$inject = [];
    function compareTo() {
        return {
            require: "ngModel",
            scope: {
                otherModelValue: "=compareTo"
            },
            link: function (scope, element, attributes, ngModel) {

                ngModel.$validators.compareTo = function (modelValue) {
                    return modelValue == scope.otherModelValue;
                };

                scope.$watch("otherModelValue", function () {
                    ngModel.$validate();
                });
            }
        };
    };


})();
