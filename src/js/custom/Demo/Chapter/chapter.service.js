/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('chapterService', chapterService)
    ;

    chapterService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function chapterService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;
        vm.courseList = function (chapterId) {
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
        vm.selectedChapter = function (chapterId) {
            var deferred = $q.defer();
            $http.get("server/admin/chapter", {
                params: {Id: chapterId},
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

        vm.editChapter = function (chapterId,chapter) {
            var deferred = $q.defer();
            $http.post("server/admin/chapterUpdate", {Id:chapterId,chapter:chapter}, {
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

        vm.newChapter = function (chapter) {
            var deferred = $q.defer();
            $http.post("server/admin/chapterAdd", {chapter: chapter}, {
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
