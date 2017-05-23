/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('profileService', profileService)
    ;

    profileService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function profileService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;
        vm.userDetails = function (profileName) {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/userDetails", {
                params: {profileName: profileName},
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

        vm.updateUserDetails = function (userDetails) {
            var deferred = $q.defer();
            $http.post("server/edusoftuser/updateUserDetails",userDetails, {
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

        vm.profileExists = function (profileName) {
            var deferred = $q.defer();
            $http.get("server/profile/profileExists", {
                params: {profileName: profileName},
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
        vm.profileList = function () {
            var deferred = $q.defer();
            $http.post("server/profile/profileList/", '', {
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
        vm.newprofile = function (profile) {
            var deferred = $q.defer();
            $http.post("server/profile/addProfile/", {profileDetails: profile}, {
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
        vm.selectedProfileList = function (profileId) {
            var deferred = $q.defer();
            $http.post("server/profile/profileList/", {profileId: profileId}, {
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
        // Delete Appointment
        vm.deleteProfile = function (profileId) {
            console.log(profileId);
            var deferred = $q.defer();
            $http.delete("server/profile/deleteProfile/" + profileId, {
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

        vm.EditProfile = function (profileId, profileDetails) {
            var deferred = $q.defer();
            $http.post("server/profile/editProfile/", {profileId: profileId, profileDetails: profileDetails}, {
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
