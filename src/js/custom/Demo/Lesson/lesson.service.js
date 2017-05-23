/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('lessonService', lessonService)
    ;

    lessonService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function lessonService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;
        vm.courseList = function () {
            var deferred = $q.defer();
            $http.get("server/admin/courseList", {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (err, responseCode) {
                    deferred.reject({message: "Sorry! Could not find data.", response: err});
                });
            return deferred.promise;
        };

        vm.chapterList = function (courseId) {
            var deferred = $q.defer();
            $http.get("server/admin/chapterList", {
                params: {Id: courseId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (err, responseCode) {
                    deferred.reject({message: "Sorry! Could not find data.", response: err});
                });
            return deferred.promise;
        };

        vm.selectedLesson = function (lessonId) {
            var deferred = $q.defer();
            $http.get("server/admin/lesson", {
                params: {Id: lessonId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (err, responseCode) {
                    deferred.reject({message: "Sorry! Could not find data.", response: err});
                });
            return deferred.promise;
        };

        vm.editLesson = function (lessonId, lesson) {
            var deferred = $q.defer();
            $http.post("server/admin/lessonUpdate", {Id: lessonId, lesson: lesson}, {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not find data.", response: err});
                });
            return deferred.promise;
        };

        vm.newLesson = function (lesson) {
            var deferred = $q.defer();
            console.log(lesson);
            $http.post("server/admin/lessonAdd", {lesson:lesson}, {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);
                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not find data.", response: err});
                });
            return deferred.promise;
        };
    }
})();
