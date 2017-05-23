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
        .controller('AddNewUserController', AddNewUserController)
        .directive("compareTo", compareTo);
    AddNewUserController.$inject = ['$rootScope', '$scope', '$http', '$state', '$filter', 'SweetAlert', '$window'];
    function AddNewUserController($rootScope, $scope, $http, $state, $filter, SweetAlert, $window) {
        var vm = this;
        vm.today = function () {
            //vm.dt = new Date();
            vm.dt = '';
        };
        vm.today();

        vm.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };
        vm.dateOptions1 = {
            formatYear: 'yy',
            startingDay: 1
        };
        vm.format = 'dd-MM-yyyy';
        vm.open = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
            vm.opened = true;
        };
        vm.open1 = function ($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened1 = true;
        };

        vm.clear = function () {
            vm.dt = null;
        };
        vm.clear = function () {
            vm.dt1 = null;
        };
        vm.dtmax = new Date();

        $scope.IsHidden = true;
        $scope.ShowHide = function () {
            $scope.IsHidden = $scope.IsHidden ? false : true;
        };

        $scope.reset = function () {
            $scope.myImage = '';
            $scope.myCroppedImage = '';
            $scope.imgcropType = 'square';
        };
        $scope.reset();
        var handleFileSelect = function (evt) {
            var file = evt.currentTarget.files[0];
            var reader = new FileReader();
            reader.onload = function (evt) {
                $scope.$apply(function ($scope) {
                    $scope.myImage = evt.target.result;
                });
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        };

        angular.element(document.querySelector('#fileInput')).on('change', handleFileSelect);

        //----Add New Seafarer------------


        var user = JSON.parse($window.sessionStorage["user"]);
        $scope.companyid = user.session.co_id;
        $scope.FormData = {};

        $scope.savedata = function () {

            $scope.FormData.dob = $filter('date')(new Date($scope.FormData.dob), "yyyy/MM/dd");
            if (vm.myform.$valid) {
                $http({
                    method: 'POST',
                    url: 'server/company/addCandidateData',
                    data: {data: $scope.FormData, imgfile:$scope.myCroppedImage, cid: $scope.companyid},
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                    .success(function (data) {
                      //  console.log(data);
                        $state.go('app.crewlist');
                        $rootScope.popup = true;
                        $rootScope.name = $scope.FormData.fname + " " + $scope.FormData.lname;
                    })
                    .error(function (error, status) {
                        $scope.FormData.error = {error: error, status: status};
                    })
            }
            else {
                $scope.seterror = true;
                $scope.selcountry = null;
                $scope.selnationality = null;
                $scope.selemail = null;
                $scope.seldob = null;
                $scope.selgender = null;
                switch (vm.myform.$invalid) {
                    case angular.isUndefined($scope.FormData.nationality):
                        $scope.selnationality = true;

                    case angular.isUndefined($scope.FormData.countryId):
                        $scope.selcountry = true;

                    case angular.isUndefined($scope.FormData.email):
                        $scope.selemail = true;
                     }
                if(!$scope.FormData.dob){
                    $scope.seldob = true;
                }
                if(!$scope.FormData.gender){
                    $scope.selgender = true;
                }
            }
        }



        //----------For getcountry-------------

        $http({
            method: 'GET',
            url: 'server/company/getcountryData',
            headers: {'X-API-KEY': $rootScope.currentUser.key}
        })
            .success(function (data) {
                $scope.countryId = data;
            });

        //----------For getnationality-------------

        $http({
            method: 'GET',
            url: 'server/company/getnationalityData',
            headers: {'X-API-KEY': $rootScope.currentUser.key}
        })
            .success(function (data) {
                $scope.nationalityId = data;
            });

        //---------For getvessel--------------

        $http({
            method: 'GET',
            url: 'server/company/getVesselData',
            headers: {'X-API-KEY': $rootScope.currentUser.key}

        })
            .success(function (data) {
                $scope.vessel_name = data;

            });

        //--------For Rank List--------------

        $http({
            method: 'GET',
            url: 'server/company/getRankData',
            headers: {'X-API-KEY': $rootScope.currentUser.key}

        })
            .success(function (data) {
                $scope.rank_list = data;

            });

        $scope.FormData = {passno: ''};
        $scope.fetchdata = function () {

            $scope.$watch('FormData.passno', function () {
                    $http({
                        method: 'POST',
                        url: 'server/company/getPassnoData',
                        data: {passno: $scope.FormData.passno, cid: $scope.companyid},
                        headers: {'X-API-KEY': $rootScope.currentUser.key}
                    })
                        .success(function (data) {
                            if (data.name != false) {
                                SweetAlert.swal({
                                    title: "Warning?",
                                    text: "User with this passport number is already registered as " + data.name.f_name + " " + data.name.l_name,
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "View Profile",
                                    cancelButtonText: "Cancel",
                                    closeOnConfirm: true,
                                    closeOnCancel: false
                                }, function (isConfirm) {
                                    if (isConfirm) {
                                        var result = {CandId: data.id};
                                        $state.go('app.profile', result);
                                    } else {
                                        $scope.pass_no = null;
                                        SweetAlert.swal("cancel");
                                    }
                                });
                            }
                        }).error(function (err) {
                        console.log(err);
                    });
                }
            )
        };

    }
    compareTo.$inject = [];
    function compareTo() {
        return {
            require: "ngModel",
            scope: {
                otherModelValue: "=compareTo"
            },
            link: function(scope, element, attributes, ngModel) {

                ngModel.$validators.compareTo = function(modelValue) {
                    return modelValue == scope.otherModelValue;
                };

                scope.$watch("otherModelValue", function() {
                    ngModel.$validate();
                });
            }
        };
    };


})();
