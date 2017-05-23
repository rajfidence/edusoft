/**
 * Created by 3 Cube on 18-06-2016.
 */

(function () {
    'use strict';

    angular
        .module('naut')
        .service('userService', userService);

    userService.$inject = ['$rootScope', '$http', '$q'];

    function userService($rootScope, $http, $q) {

        var vm = this;

        vm.userGet = function () {
            var deferred = $q.defer();
            $http.get("server/admin/userGet", {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message: "Error in fetching list.", response: err});
                });
            return deferred.promise;
        };

        vm.userAdd = function () {
            var deferred = $q.defer();
            $http.get("server/admin/userAdd", {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message: "Error in fetching list.", response: err});
                });
            return deferred.promise;
        };

        vm.userUpdate = function () {
            var deferred = $q.defer();
            $http.get("server/admin/userUpdate", {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message: "Error in fetching list.", response: err});
                });
            return deferred.promise;
        };
    }
})();