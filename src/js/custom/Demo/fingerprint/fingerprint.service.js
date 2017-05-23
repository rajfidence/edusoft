/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('FingerprintService', FingerprintService)
    ;

    FingerprintService.$inject = ['$rootScope', '$http', '$q'];
    function FingerprintService($rootScope, $http, $q) {
        var vm = this;
        vm.uri = "https://localhost:8003/mfs100/";
        vm.MFS100Request = {
            Quality: 60,
            TimeOut: 20
        };
        vm.capture = function () {
            return vm.PostMFS100Client("capture", vm.MFS100Request);
        };
        vm.postRequest = function () {
            var deferred = $q.defer();
            $http.get("server/appointments/dropdownList", {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not delete entry.", response: err});
                });
            return deferred.promise;
        };

        vm.saveFingerprint = function (fingerPrintData) {
            var deferred = $q.defer();
            $http({
                method: 'post',
                url: 'server/fingerprint/SaveFingerprint',
                data: fingerPrintData,
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                deferred.resolve(data);
            }).error(function (error) {
                deferred.reject({message: "Sorry! Could not find Data.", response: error});
            });
            return deferred.promise;
        };

        vm.fingerPrint=function (CandId) {
            var deferred = $q.defer();
            $http({
                method: 'post',
                url: 'server/fingerprint/get_fingerprint',
                data: {id:CandId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                deferred.resolve(data);
            }).error(function (error) {
                deferred.reject({message: "Sorry! Could not find Data.", response: error});
            });
            return deferred.promise;
        };

        vm.PostMFS100Client = function (method, jsonData) {
            var deferred = $q.defer();
            $.support.cors = true;
            $http({
                method: 'POST',
                url: vm.uri + method,
                data: JSON.stringify(jsonData),
                crossDomain: true,
                contentType: "application/json; charset=utf-8"
            }).success(function (data) {
                deferred.resolve(data);
            }).error(function (error) {
                deferred.reject({message: "Sorry! Could not add entry.", response: error});
            });
            return deferred.promise;
        };

        vm.updateAppointment = function (appointmentData, apptId) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/appointments/updateAppointmentData',
                data: {appointmentData: appointmentData, apptId: apptId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                deferred.resolve(data);
            }).error(function (error) {
                deferred.reject({message: "Sorry! Could not update entry.", response: error});
            });
            return deferred.promise;
        };




    }


})();
