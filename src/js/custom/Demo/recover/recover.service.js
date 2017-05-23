/**
 * Created by 3 Cube on 18-06-2016.
 */

(function () {
    'use strict';

    angular
        .module('naut')
        .service('passrecovery',passrecovery);

    passrecovery.$inject = ['$rootScope', '$http', '$q'];
    function passrecovery($rootScope, $http, $q) {
        var vm = this;

        vm.sendreq = function (emailid) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/users/passwordRecovery',
                data: {data: emailid}
            }).success(function (data) {
                deferred.resolve(data);
            })
              .error(function (error) {
                deferred.reject({message: "error.", response: error});
             });
            return deferred.promise;
        }

        vm.newpassword = function (resetid, pass1) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/users/passwordUpdate',
                data: {rid: resetid, newpass: pass1}
            }).success(function (data) {
                deferred.resolve(data);
            })
                .error(function (error) {
                    deferred.reject({message: "error.", response: error});
                });
            return deferred.promise;
        }
        
        vm.passwordkeystatus = function (resetid) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'server/users/passKeyStatus',
                params: {rid: resetid}
            }).success(function (data) {
                deferred.resolve(data);
            }).error(function (error) {
                    deferred.reject({message: "error.", response: error});
              });
            return deferred.promise;
        }

    }

})();