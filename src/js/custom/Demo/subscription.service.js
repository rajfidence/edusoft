/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('subscriptionService', subscriptionService)
    ;

    subscriptionService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function subscriptionService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;

        vm.subscriptions=function ()
        {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/subscriptions",{
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
        vm.videolist=function ()
        {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/videoList",{
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
         vm.presentationList=function ()
        {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/presentationList",{
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
        vm.askAnExpert=function (data)
        {
            var deferred = $q.defer();
            $http.post("server/edusoftuser/askAnExpert",data,{
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
    }


})();
