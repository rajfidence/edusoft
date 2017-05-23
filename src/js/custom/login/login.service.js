/**=========================================================
 * Module: LoginService.js
 * Services to retrieve global colors
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .factory('AuthService', AuthService)
        .factory('AuthResolver', AuthResolver)
        .service('Session', function () {
            this.create = function (sessionId, userId, userRole, userAccess) {
                this.id = sessionId;
                this.userId = userId;
                this.userRole = userRole;
                this.userAccess = JSON.parse(userAccess);
            };
            this.destroy = function () {
                this.id = null;
                this.userId = null;
                this.userRole = null;
            };
        });

    AuthService.$inject = ['$http', 'Session', '$window', '$rootScope', '$state', 'AUTH_EVENTS','USER_ROLES'];
    function AuthService($http, Session, $window, $rootScope, $state, AUTH_EVENTS, USER_ROLES) {
        var authService = {};
        authService.login = function (credentials) {
            return $http
                .post('server/users/login', credentials)
                .then(function (res) {
                    Session.create(res.data.id, res.data.user.id, res.data.user.role, res.data.user.session.UserModuleAccess);
                    return res.data.user;
                });
        };

        authService.unlock = function (credentials) {
            return $http
                .post('server/users/login', credentials)
                .then(function (res) {
                    return res.data.user;
                });
        };

        authService.isAuthenticated = function () {
            return !!Session.userId;
        };

        authService.isAuthorized = function (authorizedRoles) {
            // var authRole=authorizedRoles;
            // var userAccess=Session.userAccess;
            // if (!angular.isArray(authorizedRoles)) {
            //     authorizedRoles = [authorizedRoles];
            // }
            // return (authService.isAuthenticated() &&
            // authorizedRoles.indexOf(Session.userRole) !== -1);
            if (authService.isAuthenticated() &&
                !angular.isUndefined(USER_ROLES[authorizedRoles]) && !angular.isUndefined(Session.userAccess[authorizedRoles]))
            {
                if(Session.userAccess[authorizedRoles] === "ReadOnly"){
                    $rootScope.noAccess = true;
                    $rootScope.noAccessMessage = "NOTE: You Have Read Only Access. Please Contact Administrator.";
                    return true;
                } else {
                    delete $rootScope.noAccess;
                    delete $rootScope.noAccessMessage;
                    return (Session.userAccess[authorizedRoles]===USER_ROLES[authorizedRoles]);
                }
            }
            else{
                return false;
            }
        };

        authService.logout = function(){
            Session.destroy();
            $window.sessionStorage.removeItem("user");
            $rootScope.$broadcast(AUTH_EVENTS.logoutSuccess);
            $state.go('page.login');
        };
        return authService;
    }

    AuthResolver.$inject = ['$q', '$rootScope', '$state'];
    function AuthResolver($q, $rootScope, $state) {
        return {
            resolve: function () {
                var deferred = $q.defer();
                var unwatch = $rootScope.$watch('currentUser', function (currentUser) {
                    if (angular.isDefined(currentUser)) {
                        if (currentUser) {
                            deferred.resolve(currentUser);
                        } else {
                            deferred.reject();
                            $state.go('page.login');
                        }
                        unwatch();
                    }
                });
                return deferred.promise;
            }
        };
    }
    
   






})();