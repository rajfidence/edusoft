/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('ServerSideProcessingCtrl1', ServerSideProcessingCtrl);
    ServerSideProcessingCtrl.$inject = ['intro', '$rootScope', 'DTOptionsBuilder', 'DTColumnBuilder', '$stateParams', 'toaster', 'profileService', '$scope', 'SweetAlert','$compile', '$log', 'AUTH_EVENTS'];
    function ServerSideProcessingCtrl(intro, $rootScope, DTOptionsBuilder, DTColumnBuilder, $stateParams, toaster, profileService, $scope, SweetAlert,$compile, $log, AUTH_EVENTS) {
        var vm = this;
        //Datatables
        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                url: 'server/profile/ListMedicalProfiles',
                headers: {'X-API-KEY': $rootScope.currentUser.key},
                type: 'POST',
                error: function (response){
                    if(response.status===400){
                        $rootScope.$broadcast(AUTH_EVENTS.sessionTimeout);
                        // $state.go('page.login');
                    }else if(response.status===401){
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
                    }else if(response.status===403){
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
                    }else if(response.status===503){
                        $rootScope.$broadcast(AUTH_EVENTS.serverSessionClosed, response.responseJSON);
                    }
                    else{
                        $log.error(response);
                        toaster.error({title: "Datatables Error", body: "Error fetching data."});
                    }
                }
            })
            .withDataProp('data')
            .withOption('serverSide', false)
            .withOption('processing', true)
            .withOption('order', [[0, 'asc']])
            .withPaginationType('full_numbers')
            .withLanguage({
                "processing":'<i class="fa fa-spinner fa-spin fa-2x"></i>'
            });
        vm.dtColumns = [
            DTColumnBuilder.newColumn('dr_name').withTitle('Doctor Name'),
            DTColumnBuilder.newColumn('Profile_name').withTitle('Profile Name'),
            DTColumnBuilder.newColumn('Profile_desc').withTitle('Description'),
            DTColumnBuilder.newColumn('profile_age').withTitle('Age Group'),
            DTColumnBuilder.newColumn('CreatedDateTime').withTitle('Created Date'),
            DTColumnBuilder.newColumn(null).withOption('searchable', false).withTitle('Action').notSortable()
                .renderWith(function (data, type, full, meta) {

                    return '<a title="Edit" type="button" id="step2" ui-sref="app.editprofile({profileId:\'' + data.profile_id + '\'})" class="mr btn btn-circle btn-info"><em class="fa fa-pencil-square-o"></em></a>' +
                        '<button title="Delete" type="button" ng-disabled="noAccess" id="step3"  ng-click = "deleteProfile({profileId:\'' + data.profile_id + '\'})" class="mr btn btn-circle btn-danger"><em class="fa fa-times"></em></button>';
                })
        ];
        $scope.reload = reloadData;
        vm.dtInstance = {};
        function reloadData() {
            var resetPaging = false;
            vm.dtInstance.reloadData(callback, resetPaging);
        }
        vm.dtOptions.withOption('fnRowCallback',
            function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $compile(nRow)($scope);
            });
        if ($stateParams.obj == 'Inserted') {
            toaster.success("Profile was created.");
        } else if ($stateParams.obj == 'Edited') {
            toaster.success("Profile was edited.");
        } else if ($stateParams.obj == 'error') {
            toaster.error("Some error occurred.");
        }
        $scope.deleteProfile = function (profileId) {
            SweetAlert.swal({
                    title: "Are you sure?",
                    text: "You want to delete the profile?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        profileService.deleteProfile(profileId)
                            .then(function (response) {
                                    toaster.success("Profile deleted successfully.");
                                    vm.dtInstance.reloadData();
                                },
                                function (err) {
                                    toaster.error("Some error occurred while deleting profile.");
                                    return false;
                                });
                    }
                }
            );
        }
        //------------------------ code for Angular Intro----------
        $rootScope.IntroOptions="";
        $rootScope.IntroOptions = {
            steps:intro.medicalprofilelist,
            showStepNumbers: false,
            exitOnOverlayClick: true,
            exitOnEsc:true,
            nextLabel: '<strong>NEXT!</strong>',
            prevLabel: '<span style="color:green">Previous</span>',
            skipLabel: 'Exit',
            doneLabel: 'Thanks'
        };

        $rootScope.CompletedEvent = function (scope) {
            console.log("Completed Event called");
        };

        $rootScope.ExitEvent = function (scope) {
            console.log("Exit Event called");
        };

        $rootScope.ChangeEvent = function (targetElement, scope) {
            console.log("Change Event called");
            console.log(targetElement);  //The target element
            console.log(this);  //The IntroJS object
        };

        $rootScope.BeforeChangeEvent = function (targetElement, scope) {
            console.log("Before Change Event called");
            console.log(targetElement);
        };

        $rootScope.AfterChangeEvent = function (targetElement, scope) {
            console.log("After Change Event called");
            console.log(targetElement);
        };

    }


})();


