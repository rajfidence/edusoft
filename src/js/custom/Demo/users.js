/**
 * Created by 3 Cube on 1/21/2016.
 */
/*USERCONTROLLER*/


(function () {
    'use strict';

    angular
        .module('naut')
        .controller('ServerSideProcessingCtrl', ServerSideProcessingCtrl);
    ServerSideProcessingCtrl.$inject = ['intro','$rootScope', 'DTOptionsBuilder','$compile', 'DTColumnBuilder','$state','$scope','toaster','SweetAlert','NewUserService', 'AUTH_EVENTS'];
    function ServerSideProcessingCtrl(intro, $rootScope, DTOptionsBuilder,$compile, DTColumnBuilder,$state,$scope,toaster,SweetAlert,NewUserService, AUTH_EVENTS) {
        var vm=this;

        if($rootScope.useraddflag == 'edit')
        {
            toaster.success("User Updated Successfully");
            $rootScope.useraddflag = false;
        }
        else if($rootScope.useraddflag == 'new')
        {
            toaster.success('User Added Successfully');
            $rootScope.useraddflag = false;
        }

        //Datatables
        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                url: 'server/company/ListUsers',
                headers: {'X-API-KEY': $rootScope.currentUser.key},
                type: 'POST',
                error: function (response){
                    if(response.status===400){
                        $rootScope.$broadcast(AUTH_EVENTS.sessionTimeout);
                    }else if(response.status===401){
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
                    }else if(response.status===403){
                        $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
                    }else if(response.status===503){
                        $rootScope.$broadcast(AUTH_EVENTS.serverSessionClosed, response.responseJSON);
                    }
                    else{
                        toaster.error({title: "Datatables Error", body: "Error fetching data."});
                    }
                }
            })
            .withDataProp('data')
            .withOption('serverSide', true)
            .withOption('processing', true)
            .withOption('order', [[0, 'asc']])
            .withPaginationType('full_numbers')
            .withLanguage({
                "processing":'<i class="fa fa-spinner fa-spin fa-2x"></i>'
            });
        vm.dtColumns = [
            DTColumnBuilder.newColumn('user_name').withTitle('Name'),
            DTColumnBuilder.newColumn('email').withTitle('Email'),
            DTColumnBuilder.newColumn('Mobile_no').withTitle('Mobile No.'),
            DTColumnBuilder.newColumn(null).withOption('searchable', false).withTitle('Action').notSortable()
                .renderWith(function (data, type, full, meta) {
                        return '<a title="Edit" id="step2" type="button" ui-sref="app.edit_users({UserId:\'' + data.user_id + '\'})" class="mr btn btn-circle btn-info"><em class="fa fa-pencil-square-o"></em></a>' +
                        '<button title="Delete" id="step3" type="button" ng-click = "deleteuser({UserId:\'' + data.user_id + '\'})" class="mr btn btn-circle btn-danger"><em class="fa fa-times"></em></button>';
                })
        ];

        vm.dtOptions.withOption('fnRowCallback',
            function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $compile(nRow)($scope);
                $scope.$apply();
            });

        $scope.reload = reloadData;
        vm.dtInstance = {};
        function reloadData() {
            var resetPaging = false;
            vm.dtInstance.reloadData(callback, resetPaging);
        }


        $scope.deleteuser = function(Id)
        {
            SweetAlert.swal({
                    title: "Are you sure?",
                    text: "You want to delete the User?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        NewUserService.deleteUser(Id['UserId'])
                            .then(function (response) {
                                    console.log(response);
                                    SweetAlert.swal("Deleted!", response.Msg, "success");
                                    vm.dtInstance.reloadData();
                                },
                                function (err) {
                                    SweetAlert.swal("Cancelled", err.Msg, "error");
                                });
                    }
                }
            );
        };

        //------------------------ code for Angular Intro----------
        $rootScope.IntroOptions="";
        $rootScope.IntroOptions = {
            steps:intro.userslist,
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
