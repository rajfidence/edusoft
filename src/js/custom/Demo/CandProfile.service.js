/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('AppointmentService', AppointmentService)
        .service('ImageUploadService', ImageUploadService)
    ;

    AppointmentService.$inject = ['$rootScope', '$http', '$q'];
    function AppointmentService($rootScope, $http, $q) {
        var vm = this;
        
        vm.listData = function () {
            var deferred = $q.defer();
            $http.get("server/appointments/dropdownListData", {
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

        //Clinic list
        vm.clinicList = function (drId) {
            var deferred = $q.defer();
            $http.get("server/appointments/clinicList", {
                params: {drId: drId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not Found Data.", response: err});
                });
            return deferred.promise;
        };
        

        vm.newAppointment = function (appointmentData, userinfo) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/appointments/createAppointment',
                data: {appointmentData: appointmentData, userid: userinfo, file: $rootScope.file},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                deferred.resolve(data);
            })
                .error(function (error) {
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

        vm.editAppointmentDetails = function (apptdate) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: 'server/appointments/editAppointmentData',
                params: {id: apptdate},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function(data){
                deferred.resolve(data);
            }).error(function (error){
                deferred.reject({message: "Sorry! Could not Found Data.", response: error});
            });
            return deferred.promise;
        };

        vm.updateseafarer = function (seafarerData, seafarerid) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/app/saveSeafarerData',
                data: {data: seafarerData, candid: seafarerid},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function(data){
                deferred.resolve(data);
            }).error(function (error){
                deferred.reject({message: "Sorry! Could not Found Data.", response: error});
            });
            return deferred.promise;
        };

        vm.GetLogdata = function(CaseId)
        {
            var deferred = $q.defer();
            $http.get("server/PAI/GetLogData",{
                params : {CaseId : CaseId},
                headers: {'X-API-KEY' : $rootScope.currentUser.key}
            }).success(function (response){
                deferred.resolve(response);
            }).error(function(err){
                deferred.reject({message: "Sorry ! Could not found data", response:err});
            });
            return deferred.promise;
        };

        vm.GetCandidateData = function(EventId)
        {
            var deferred = $q.defer();
            $http.get("server/PAI/GetCandidateData",{
                params : {EventId : EventId},
                headers: {'X-API-KEY' : $rootScope.currentUser.key}
            }).success(function (response){
                deferred.resolve(response);
            }).error(function(err){
                deferred.reject({message: "Sorry ! Could not found data", response:err});
            });
            return deferred.promise;
        };
    }

    ImageUploadService.$inject = ['$rootScope', '$http', '$q'];
    function ImageUploadService($rootScope, $http, $q) {
        var vm =this;
        vm.uploadImage = function(imagedata)
        {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/company/updateCandidateImage',
                data: {data: imagedata},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response){
                deferred.resolve(response);
            }).error(function(err){
                deferred.reject({message: "Sorry ! Could not found data", response:err});
            });
            return deferred.promise;
        };
    }


})();
