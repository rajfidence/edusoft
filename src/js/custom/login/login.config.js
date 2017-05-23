/**=========================================================
 * Module: ColorsRun
 =========================================================*/

(function() {
    'use strict';

    angular
        .module('naut')
        .config(loginConfig)
        .config(sessionConfig)
        .factory('AuthInterceptor',AuthInterceptor)
        .directive('loginDialog', loginDialog);

    loginConfig.$inject = ['$httpProvider'];
    function loginConfig($httpProvider) {
        $httpProvider.interceptors.push([
            '$injector',
            function ($injector) {
                return $injector.get('AuthInterceptor');
            }
        ]);
    }

    sessionConfig.$inject = ['IdleProvider', 'KeepaliveProvider'];
    function sessionConfig(IdleProvider, KeepaliveProvider) {
        IdleProvider.idle(600);  // 10 minutes idle
        IdleProvider.timeout(10);  // after seconds idle, time the user out
        KeepaliveProvider.interval(300);  //  keep-alive ping
    }
    AuthInterceptor.$inject=['$rootScope', '$q', 'AUTH_EVENTS'];
    function AuthInterceptor($rootScope, $q, AUTH_EVENTS){
        return {
            responseError: function (response) {
                $rootScope.$broadcast({
                    401: AUTH_EVENTS.notAuthenticated,
                    403: AUTH_EVENTS.notAuthorized,
                    400: AUTH_EVENTS.loginFailed,
                    440: AUTH_EVENTS.sessionTimeout,
                    503: AUTH_EVENTS.serverSessionClosed 
                }[response.status], response);
                return $q.reject(response);
            }
        };
    }

    loginDialog.$inject=['AUTH_EVENTS'];
    function loginDialog (AUTH_EVENTS) {
        return {
            restrict: 'A',
            template: '<div ng-if="visible" ng-include="\'page.login.html\'">',
            link: function (scope) {
                var showDialog = function () {
                    scope.visible = true;
                };

                scope.visible = false;
                scope.$on(AUTH_EVENTS.notAuthenticated);
                scope.$on(AUTH_EVENTS.sessionTimeout);
            }
        };
    }

})();
