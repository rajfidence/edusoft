/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('pdfService', pdfService)
    ;

    pdfService.$inject = ['$rootScope', '$http', '$q', 'AUTH_EVENTS'];
    function pdfService($rootScope, $http, $q, AUTH_EVENTS) {
        var vm = this;
        vm.pdf = function (page,id) {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/pdf", {
                params: {page:page, id: id},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
        vm.comments = function (page,id) {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/comments", {
                params: {page:page, id: id},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
        vm.addComments=function (data)
        {
            var deferred = $q.defer();
            $http.post("server/edusoftuser/comments",data,{
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
