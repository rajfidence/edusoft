/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('Profile', Profile)
        .run(function ($rootScope) {
            $rootScope.typeOf = function (value) {
                return typeof value;
            };
        })

        .directive('stringToNumber', function () {
            return {
                require: 'ngModel',
                link: function (scope, element, attrs, ngModel) {
                    ngModel.$parsers.push(function (value) {
                        return '' + value;
                    });
                    ngModel.$formatters.push(function (value) {
                        return parseFloat(value, 10);
                    });
                }
            };
        });
    Profile.$inject = ['$log', 'profileService', '$stateParams', '$scope','$rootScope', '$state', 'SweetAlert','toaster'];
    function Profile($log, profileService, $stateParams, $scope,$rootScope, $state, SweetAlert, toaster) {
        var vm = this;
        $scope.userDetails={};
        // Datepicker
        // -----------------------------------

        vm.today = function() {
            $scope.userDetails.DateOfBirth = new Date();
        };
        vm.today();

        vm.clear = function () {
            $scope.userDetails.DateOfBirth = null;
        };

        // Disable weekend selection
        vm.disabled = function(date, mode) {
            return false; //( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        vm.toggleMin = function() {
            vm.minDate = vm.minDate ? null : new Date();
        };
        vm.toggleMin();

        vm.open = function($event) {
            $event.preventDefault();
            $event.stopPropagation();

            vm.opened = true;
        };

        vm.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        vm.initDate = new Date('2016-15-20');
        vm.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        vm.format = vm.formats[0];
//
        vm.userDetail = profileService.userDetails()
            .then(function (response) {
                    $scope.userDetails = response;
                // console.log($scope.userDetails);
                },
                function (err) {
                    // $log.error(err);
                    return false;
                });
        // vm.userDetails();
        vm.updateDetails = function () {
            profileService.userDetails()
                .then(function (response) {

                        $scope.profileDetails = response['ProfileDetail'];
                        $scope.profile = response['TestList'];
                    },
                    function (err) {
                        // $log.error(err);
                        return false;
                    });
        };
        $scope.submit = function (form) {
            if (form.$valid) {
                vm.updateUserDetails = profileService.updateUserDetails($scope.userDetails)
                    .then(function (response) {
                            var user=$rootScope.currentUser;
                            // user.user=$scope.userDetails.FirstName+" "+$scope.userDetails.LastName;
                           // $window.sessionStorage["user"] = JSON.stringify(user);
                            $state.go('app.dashboard', {obj: 'Edited'});
                        },
                        function (err) {
                            toaster.error({title: "Datatables Error", body: "Error fetching data."});
                        });
            }
        };
    }


})();


