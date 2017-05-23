/**=========================================================
 * Module: ColorsRun
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .run(function ($rootScope, AUTH_EVENTS, AuthService, $window, Session, $state, USER_ROLES) {
                $rootScope.$on('$stateChangeStart', function (event, next) {
                    if ($window.sessionStorage["user"]) {
                        $rootScope.currentUser = JSON.parse($window.sessionStorage["user"]);
                        Session.create($rootScope.currentUser.key, $rootScope.currentUser.id, $rootScope.currentUser.role, $rootScope.currentUser.UserAccess);
                    }
                    if(angular.isDefined(next.data)) {
                        var authorizedRoles = next.data.authorizedRoles;
                    } else {
                        authorizedRoles = '';
                    }
                    if (!AuthService.isAuthorized(authorizedRoles) && authorizedRoles != 0) {
                        event.preventDefault();
                        if (AuthService.isAuthenticated()) {
                            // user is not allowed
                            $rootScope.$broadcast(AUTH_EVENTS.notAuthorized);
                        } else {
                            // user is not logged in
                            $rootScope.$broadcast(AUTH_EVENTS.notAuthenticated);
                        }
                    }
                    $rootScope.doTheBack=function () {
                        $window.history.back();
                    };
                    $rootScope.doTheFor=function () {
                        $window.history.forward();
                    };
                });
            $rootScope.logout = function(){
                AuthService.logout();
            };
            }
        );
})();
