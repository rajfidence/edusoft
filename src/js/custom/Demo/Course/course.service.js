/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('courseService', courseService)
    ;

    courseService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function courseService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;
        vm.selectedCourse = function (Id) {
            var deferred = $q.defer();
            $http.get("server/admin/course", {
                params: {Id: Id},
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

        vm.editCourse = function (courseId,course) {
            var deferred = $q.defer();
            $http.post("server/admin/editCourse", {Id:courseId,course:course}, {
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

        vm.newCourse = function (course) {
            var deferred = $q.defer();
            $http.post("server/profile/addProfile", {course: course}, {
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
