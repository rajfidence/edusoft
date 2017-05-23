/**
 * Created by 3 Cube on 1/23/2016.
 */

/*UserAController*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('UserAController', UserAController);
    UserAController.$inject = ['$scope', '$stateParams', 'NewUserService', '$rootScope', '$log', 'SweetAlert', '$state'];
    function UserAController($scope, $stateParams, NewUserService, $rootScope, $log, SweetAlert, $state) {
        var vm = this;

        $scope.init = function () {
            $scope.PasswordFlag = !!$stateParams.UserId;
        };
        $scope.init();

        $scope.AccessTypes = [
            {AccessId: "1", AccessName: "Management"},
            {AccessId: "2", AccessName: "Group"},
            {AccessId: "3", AccessName: "Fleet"}
        ];

        $scope.check = function (event) {
            $scope.confirmed = true;
            $scope.nonconfirmed = false;
            $scope.confirmed = 'true';
            $scope.formInfo.radio.Appointments = 'Full';
            $scope.formInfo.radio.Treatment = 'Full';
            $scope.formInfo.radio.VMC = 'Full';
            $scope.formInfo.radio.Sickbay = 'Full';
            $scope.formInfo.radio.Seafarer = 'Full';
            $scope.formInfo.radio.Vessel = 'Full';
            $scope.formInfo.radio.doctor = 'Full';
            $scope.formInfo.radio.medprofile = 'Full';
            $scope.formInfo.radio.Billing = 'Full';
            $scope.formInfo.radio.Group = 'Full';
            $scope.formInfo.radio.Notification = 'Full';
        };

        $scope.uncheck = function (event) {
            $scope.confirmed = false;
            $scope.nonconfirmed = true;
            $scope.nonconfirmed = 'false';
            $scope.formInfo.radio.Appointments = 'NoAccess';
            $scope.formInfo.radio.Treatment = 'NoAccess';
            $scope.formInfo.radio.VMC = 'NoAccess';
            $scope.formInfo.radio.Sickbay = 'NoAccess';
            $scope.formInfo.radio.Seafarer = 'NoAccess';
            $scope.formInfo.radio.Vessel = 'NoAccess';
            $scope.formInfo.radio.doctor = 'NoAccess';
            $scope.formInfo.radio.medprofile = 'NoAccess';
            $scope.formInfo.radio.Billing = 'NoAccess';
            $scope.formInfo.radio.Group = 'NoAccess';
            $scope.formInfo.radio.Notification = 'NoAccess';
        };

        $scope.email_validate = function () {
                var emailid = $scope.formInfo.email_id;
                if(vm.myForm.email.$valid) {
                    vm.emailvalidate = NewUserService.EmailValidate(emailid)
                        .then(function (response) {
                                SweetAlert.swal({
                                        title: "Duplicate Email Id detected ?",
                                        text: "User with this Email id exist as " + response.UserInfo['f_name'] + " " + response.UserInfo['l_name'] + "",
                                        type: "warning",
                                        showCancelButton: false,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "OK",
                                        closeOnConfirm: true
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $scope.formInfo.email_id = '';
                                        }
                                    });

                            },
                            function (err) {
                                $log.error(err);
                            })
                }
            
        }

        vm.UserId = $stateParams.UserId;
        if ($stateParams.UserId) {
            vm.userData = NewUserService.GetUserData($stateParams.UserId)
                .then(function (response) {
                        $scope.formInfo = response.UserInfo;
                        $scope.formInfo.radio = angular.fromJson($scope.formInfo.UserModuleAccess);
                        $scope.formInfo.cc_no = parseInt($scope.formInfo.cc_no);
                    },
                    function (err) {
                        $log.error(err);
                    })
        }

        $scope.saveData = function (form) {
            $scope.submitted = true;


            if (form) {
                if ($stateParams.UserId) {
                    NewUserService.UserUpdate($scope.formInfo, $stateParams.UserId)
                        .then(function (response) {
                            response.message;
                            $rootScope.useraddflag = 'edit';
                        });
                }
                else {
                    $scope.formInfo['accessrights'] = JSON.stringify($scope.formInfo.radio);
                    NewUserService.NewUserSave($scope.formInfo)
                        .then(function (response) {
                            response.message;
                            $state.go('app.users');
                            $rootScope.useraddflag = 'new';
                        }, function (err){
                            console.log(err);
                        });
                }
            }
        }
    }


})();

