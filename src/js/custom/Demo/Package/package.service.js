/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('packageService', packageService)
    ;

    packageService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function packageService($rootScope, $http, $q, AUTH_EVENTS) {
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

        vm.selectedPackage = function (Id) {
            var deferred = $q.defer();
            $http.get("server/admin/package", {
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

        vm.editPackage = function (packageId, Package, courses) {
            var deferred = $q.defer();
            $http.post("server/admin/packageUpdate", {Id: packageId, Package: Package, courses: courses}, {
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

        vm.newPackage = function (Package, courses) {
            var deferred = $q.defer();
            $http.post("server/admin/packageAdd", {Package: Package, courses: courses}, {
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
