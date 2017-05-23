/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('chapter', chapter);
    chapter.$inject = ['$log', 'chapterService', '$stateParams', '$scope', '$state', 'SweetAlert'];
    function chapter($log, chapterService, $stateParams, $scope, $state, SweetAlert) {
        var vm = this;
        $scope.loading=true;
        $scope.chapter={};
        vm.courseList = chapterService.courseList($stateParams.Id)
            .then(function (response) {
                    $scope.courseList = response;
                    $scope.loading=false;
                },
                function (err) {
                    $scope.loading=false;
                    return false;
                });
        if ($stateParams.Id) {
            $scope.chapterStatus = 'Edit chapter';
            vm.chapterData = chapterService.selectedChapter($stateParams.Id)
                .then(function (response) {
                        $scope.chapter = response;
                        $scope.loading=false;
                    },
                    function (err) {
                        $scope.loading=false;
                        return false;
                    });
        } else {
            $scope.chapterStatus = 'Add chapter';
        }
        $scope.submit = function (form) {
            console.log(form);
            if (form.$valid) {
                $scope.loading=true;
                if ($stateParams.Id) {
                    vm.chapterEdit = chapterService.editChapter($stateParams.Id, $scope.chapter)
                        .then(function (response) {
                                $state.go('admin.chapter', {obj: 'Edited'});
                                $scope.loading=false;
                            },
                            function (err) {
                                $state.go('admin.chapter', {obj: 'error'});
                                $scope.loading=false;
                            });

                } else {
                    vm.chapterAdd = chapterService.newChapter($scope.chapter)
                        .then(function (response) {
                                $state.go('admin.chapter', {obj: 'Inserted'});
                                $scope.loading=false;
                            },
                            function (err) {
                                $state.go('admin.chapter', {obj: 'error'});
                                $scope.loading=false;
                            });
                }
            }
        }
    }


})();


