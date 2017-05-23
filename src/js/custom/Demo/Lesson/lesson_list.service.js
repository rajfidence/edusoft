/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('courseService', courseService)
    ;

    courseService.$inject = ['$rootScope', '$http', '$q'];
    function courseService($rootScope, $http, $q) {
        var vm = this;
        // Candidate Basic Details
        vm.basicDetails = function (CandId) {
            var deferred = $q.defer();
            $http.get("server/appointments/basicdetail_Data", {
                params: {CandId: CandId},
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

        // Edit Appointment detail
        vm.editDetails = function (apptId) {
            var deferred = $q.defer();
            $http.get("server/appointments/editappointment", {
                params: {apptId: apptId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (response) {
                    deferred.resolve(response);

                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not found data.", response: err});
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

        // Delete Appointment
        vm.deleteAppointment = function (ApptId) {
            var deferred = $q.defer();
            $http.delete("server/appointments/removeappointment/" + ApptId, {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            })
                .success(function (data) {
                    deferred.resolve({message: "Appointment was deleted successfully.", response: data});
                })
                .error(function (err) {
                    deferred.reject({message: "Sorry! Could not delete entry.", response: err});
                });
            return deferred.promise;
        };


        //Display reports

        vm.displayReport = function(ApptId){
            var deferred = $q.defer();
            $http.get("server/appointment_list/fetchReports", {
                    params: {ApptId: ApptId},
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

        vm.updateAppointment = function (appointmentData) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/appointments/updateAppointmentData',
                data: {appointmentData: appointmentData, file: $rootScope.file, apptId: appointmentData.ApptId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                deferred.resolve(data);
            })
                .error(function (error) {
                    deferred.reject({message: "Sorry! Could not add entry.", response: error});
                });
            return deferred.promise;
        }


    }


})();
