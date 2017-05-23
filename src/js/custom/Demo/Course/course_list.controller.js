/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';


    angular
        .module('naut')
        .controller('courseController', courseController);
    courseController.$inject = ['intro','$scope', '$rootScope','$uibModal', 'DTOptionsBuilder', 'DTColumnBuilder', '$compile', 'courseService', 'SweetAlert', '$window', 'toaster'];
    function courseController(intro,$scope, $rootScope, $uibModal, DTOptionsBuilder, DTColumnBuilder, $compile, courseService, SweetAlert, $window, toaster) {

        /*SEARCH*/
        const vm = this;
        //Datatables
        vm.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
                url: 'server/admin/courseList',
                headers: {'X-API-KEY': $rootScope.currentUser.key},
                type: 'POST'
            })
            .withDataProp('data')
            .withOption('serverSide', true)
            .withOption('processing', true)
            // .withOption('order', [[6, 'desc']])
            .withPaginationType('full_numbers')
            .withOption('createdRow', function (row, data, dataIndex) {
                $compile(angular.element(row).contents())($scope);
            })
            .withLanguage({
                "processing":'<i class="fa fa-spinner fa-spin fa-2x"></i>'
            });

        vm.dtColumns = [
            DTColumnBuilder.newColumn('Course').withTitle('Course'),
            DTColumnBuilder.newColumn('Description').withTitle('Description'),
            DTColumnBuilder.newColumn(null).withOption('searchable', false).withTitle('Actions').notSortable()
                .renderWith(function (data, type, full, meta) {
                    //console.log(data);
                    return '<a tooltip="View Reports" class="btn btn-xs btn-primary" id="step3" ui-sref="admin.courseUpdate({Id: \'' + data.Id + '\'})">' +
                        '   <i class="fa fa-pencil-square-o"> Edit</i> ' +
                        '</a>&nbsp;';
                })
        ];


        //--------------------------- code for angular intro -----------
        $rootScope.IntroOptions="";
        $rootScope.IntroOptions = {
            steps:intro.appointmentslist,
            showStepNumbers: false,
            exitOnOverlayClick: true,
            exitOnEsc:true,
            nextLabel: '<strong>NEXT!</strong>',
            prevLabel: '<span style="color:green">Previous</span>',
            skipLabel: 'Exit',
            doneLabel: 'Thanks'
        };
    }


})();
