/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('HttpService', HttpService);
    HttpService.$inject = ['$rootScope', '$http', '$q'];
    function HttpService( $rootScope, $http, $q) {
        var deferred = $q.defer();
        var vm=this;
        var url='server/';

        vm.deleteData=function(Id){

            deleteData(Id);
        };

        //Delete
        var deleteData = function (Id){
            $http.delete("server/appointments/appointment/" + ApptId, {
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                .success(function (data) {
                    deferred.resolve({ message: "Entry was deleted successfully.",response:data });
                })
                .error(function (err) {
                    deferred.reject({message:"Sorry! Could not delete entry.",response:err});
            });
            return deferred.promise;
        };

        //Post
        var postData = function (data){
            $http.post("server/appointments/appointment/", data, {
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                .success(function (data) {
                    deferred.resolve(data);
                })
                .error(function (err) {
                    deferred.reject({message:"Sorry! Could not delete entry.",response:err});
                });
            return deferred.promise;
        };

        //Update



    }

})();
