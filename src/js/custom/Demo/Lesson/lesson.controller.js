/**
 * Created by 3 Cube on 1/20/2016.
 */
/*MEDICALPROFILECONTROLLER*/
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('lesson', lesson);
    lesson.$inject = ['$log', 'lessonService', '$stateParams', '$scope', '$state', 'SweetAlert'];
    function lesson($log, lessonService, $stateParams, $scope, $state, SweetAlert) {
        var vm = this;
        $scope.chapterDisable = true;
        $scope.loading=true;
        $scope.lesson={};
        vm.courseList = lessonService.courseList()
            .then(function (response) {
                    $scope.courseList = response;
                    $scope.loading=false;
                },
                function (err) {
                    $scope.loading=false;
                    return false;
                });

        $scope.chapters = function (courseId) {
            if($scope.lesson != undefined){
                $scope.lesson.ChapterId = undefined;
            }
            if (courseId != '') {
                $scope.loading=true;
                lessonService.chapterList(courseId)
                    .then(function (response) {
                            $scope.chapterList = response;
                            $scope.chapterDisable = false;
                            $scope.loading=false;
                        },
                        function (err) {
                            $scope.chapterDisable = true;
                            $scope.loading=false;
                            return false;
                        });
            }
        };

        if ($stateParams.Id) {
            $scope.lessonStatus = 'Edit lesson';
            vm.lessonData = lessonService.selectedLesson($stateParams.Id)
                .then(function (response) {
                        $scope.lesson = response;
                        $scope.chapters($scope.lesson.CourseId);
                    },
                    function (err) {
                        return false;
                    });
        } else {
            $scope.lessonStatus = 'Add lesson';
        }
        $scope.submit = function (form) {
            if (form.$valid) {
                if ($stateParams.Id) {
                    vm.lesson = lessonService.editLesson($stateParams.Id, $scope.lesson)
                        .then(function (response) {
                                $state.go('admin.lessonList', {obj: 'Edited'});
                            },
                            function (err) {
                                $state.go('admin.lessonList', {obj: 'error'});
                            });

                } else {
                    vm.lesson = lessonService.newLesson($scope.lesson)
                        .then(function (response) {
                                $state.go('admin.lessonList', {obj: 'Inserted'});
                            },
                            function (err) {
                                $state.go('admin.lessonList', {obj: 'error'});
                            });
                }
            }
        }
    }


})();


