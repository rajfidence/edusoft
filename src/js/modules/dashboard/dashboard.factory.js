/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .factory('DashboardFactory', DashboardFactory)
        .service('notificationservice', notificationservice);
        
        DashboardFactory.$inject = ['$http', '$q', '$rootScope'];
        function DashboardFactory($http, $q, $rootScope) {
        var vm = this;
        // interface
        var service = {
            DashBoardData: {
                PiechartData: {
                    CurrentMonth: 0,
                    TotalCalls: 0
                },
                Appointments:{
                    color:{
                        Fit:"green",
                        Unfit:"red",
                        Pending:"blue",
                    },
                    ticks:[['0', 8]['1', 9], ['2', 10], ['3', 11], ['4', 12], ['5', 13], ['6', 14], ['7', 15], ['8', 16], ['9', 17], ['10', 18], ['11', 19], ['12', 20], ['13', 21], ['14', 22], ['15', 1]],
                    Fit:[['1', 12], ['2', 14], ['3', 20], ['4', 16], ['5', 18], ['6', 14], ['7', 19], ['8', 24], ['9', 18], ['10', 14], ['11', 16], ['12', 15], ['13', 14], ['14', 16], ['15', 18]],
                    Unfit:[['1', 12], ['2', 14], ['3', 20], ['4', 16], ['5', 18], ['6', 14], ['7', 19], ['8', 24], ['9', 18], ['10', 14], ['11', 16], ['12', 15], ['13', 14], ['14', 16], ['15', 18]],
                    Pending:[['1', 12], ['2', 14], ['3', 20], ['4', 16], ['5', 18], ['6', 14], ['7', 19], ['8', 24], ['9', 18], ['10', 14], ['11', 16], ['12', 15], ['13', 14], ['14', 16], ['15', 18]]

                },
                progressLine:{},
                medicalChest:{}
            },
            getAlbums: getAlbums
        };
        return service;

        // implementation

        function getAlbums() {
            var def = $q.defer();

            $http.get("server/app/AppointmentDash", {
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                })
                .success(function (response) {
                    service.DashBoardData.Appointments = response.Appt;
                    service.DashBoardData.progressLine = response.ApptInsights;
                    service.DashBoardData.medicalChest = response.VesselChest;
                    service.DashBoardData.DashboardCount = response.DashboardCount;
                    service.DashBoardData.pi = response.pi;
                    service.DashBoardData.treatment = response.treatment;
                    service.DashBoardData.medevent = response.medevent;
                    service.DashBoardData.treatmentgraph = response.treatmentgraph;
                    service.DashBoardData.medeventgraph = response.medeventgraph;
                    def.resolve(service.DashBoardData);
                })
                .error(function (err) {
                    def.reject(err);
                });
            return def.promise;
        }

            function GetTreat()
            {
                var deferred = $q.defer();
                $http.get("server/App/EditVesselData",{
                    headers: {'X-API-KEY': $rootScope.currentUser.key}
                }).success(function (response) {
                    deferred.resolve(response);
                }) .error(function (err) {
                    deferred.reject({message: "Sorry! Could not found data.", response: err});
                });
                return deferred.promise;
            };



    }


    notificationservice.$inject = ['$http', '$q', '$rootScope'];
    function notificationservice($http, $q, $rootScope) {
        var vm = this;
        vm.GetCourse=function ()
        {
            var deferred = $q.defer();
            $http.get("server/edusoftuser/courseList",{
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }) .error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };
        vm.GetVideos=function ()
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
        vm.notificationlist = function (currentpage) {
            var deferred = $q.defer();
            $http.get("server/app/notification", {
                params: {currentpage : currentpage},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not found notification data.", response: err});
            });
            return deferred.promise;
        };

        vm.visitedstatus = function (notificationid) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/app/setVisitedStatus',
                data: {nid: notificationid},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not set company id.", response: err});
            });
            return deferred.promise;
        };

        vm.notificationtypelist = function (typeid, currentpage)
        {
            var deferred = $q.defer();
            $http.get("server/app/typeNotificationList", {
                params: {nid: typeid, currentpage : currentpage},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not found data.", response: err});
            });
            return deferred.promise;
        };

        vm.messagepost = function (message)
        {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'server/app/sentMessage',
                data: {msg: message},
                headers: {'X-API-KEY': $rootScope.currentUser.key}
            }).success(function (response) {
                deferred.resolve(response);
            }).error(function (err) {
                deferred.reject({message: "Sorry! Could not insert message.", response: err});
            });
            return deferred.promise;
        }
        
        
    }

})();
