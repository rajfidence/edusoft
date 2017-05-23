/**
 * Created by 3 Cube on 18-06-2016.
 */

(function () {
    'use strict';

    angular
        .module('naut')
        .service('NewUserService',NewUserService)

    NewUserService.$inject = ['$rootScope', '$http', '$q' ,'$state','toaster'];

    function NewUserService($rootScope,$http,$q,$state,toaster) {

        var vm=this;
        //*************************** Function to get dynamic dropdowns data ************

        vm.getUsers = function()
        {
            var deferred = $q.defer();
            $http.get("server/company/FleetFlagList",{
                    headers:{'X-API-KEY': $rootScope.currentUser.key}
                })
                .success(function (data)
                {
                    deferred.resolve(data);
                }).error(function (err) {
                deferred.reject({message:"Error in fetching list.",response:err});
            });
            return deferred.promise;
        };

        //******************  Function to send formdata to server ******************

        vm.GetUserData = function(user_id)
        {
            var deferred = $q.defer();
            $http.get("server/company/GetUserDetails",{
                params: {UserId: user_id},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        }

        vm.NewUserSave = function (formInfo){
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/company/addUserData',
                data: {data:formInfo},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                .success(function (data) {
                    deferred.resolve({ message: "User added successfully.",response:data });
                })
                .error(function (err) {
                    deferred.reject({message:"Error in add process.",response:err});
                });
            return deferred.promise;
        }

        vm.UserUpdate = function (UserData,UserId)
        {
            UserData.UserModuleAccess = JSON.stringify(UserData.radio);
            UserData.radio = null;
       
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/company/UpdateUserData',
                data: {UserData: UserData, UserId: UserId},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (data) {
                    $state.go('app.users');
                    deferred.resolve(data);
                })
                .error(function (error) {
                    deferred.reject({message: "Sorry! Could not add entry.", response: error});
                });
            return deferred.promise;
        }

        vm.deleteUser = function(UserId)
        {
            var deferred = $q.defer();
            $http.delete("server/company/deleteUser/" + UserId, {
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response){
                deferred.resolve(response);
            }).error(function (err){
                deferred.reject({message: "Sorry ! Could not delete Vessel.",response:err});
            });
            return deferred.promise;
        }

        vm.EmailValidate = function(email_id)
        {
            var deferred = $q.defer();
            $http({
                method : 'POST',
                url: 'server/company/EmailValidate',
                data: {EmailId:email_id},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function(data){
                deferred.resolve(data);
            }).error(function(error){
                deferred.reject({message: "Sorry! Error Occurred.", response: error});
            });
            return deferred.promise;
        }

    }
})();