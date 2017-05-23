/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('ApplicationController', ApplicationController)
        .controller('LoginController', LoginController)
        .directive('ngRightClick', function($parse) {
            return function(scope, element, attrs) {
                var fn = $parse(attrs.ngRightClick);
                element.bind('contextmenu', function(event) {
                    scope.$apply(function() {
                        event.preventDefault();
                        fn(scope, {$event:event});
                    });
                });
            };
        });

    LoginController.$inject = ['$scope', '$rootScope', 'AUTH_EVENTS', 'AuthService', '$state', '$window', '$q', '$modal', 'Idle', '$timeout'];
    function LoginController($scope, $rootScope, AUTH_EVENTS, AuthService, $state, $window, $q, $modal, Idle, $timeout) {
        //-------Session Timeout----------
        
        $scope.started = false;
        function closeModals() {
            if ($scope.warning) {
                $scope.warning.close();
                $scope.warning = null;
            }

            if ($scope.timedout) {
                $scope.timedout.close();
                $scope.timedout = null;
            }
        }

        $rootScope.$on('IdleStart', function() {
            closeModals();
            $scope.warning = $modal.open({
                templateUrl: 'warning-dialog.html',
                windowClass: 'modal-danger'
            });
        });

        $rootScope.$on('IdleEnd', function() {
            closeModals();
        });

        $rootScope.$on('IdleTimeout', function() {
            closeModals();
            $state.go('page.lock');
        });

        $rootScope.startSession = function() {
            closeModals();
            Idle.watch();
            $scope.started = true;
        };

        $rootScope.stop = function() {
            closeModals();
            Idle.unwatch();
            $scope.started = false;
        };

        //--------Login Authenthication----------
        
        $scope.credentials = {
            username: '',
            password: ''
        };
        $scope.emailFormat = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
        $scope.shake=false;
        $scope.login = function (credentials) {
            $scope.loading=true;
            AuthService.login(credentials).then(function (user) {
                $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
                $rootScope.setCurrentUser(user);

              //  $rootScope.setuseraccess = $rootScope.currentUser.UserAccess;
                var deferred = $q.defer();
                if (user !== null) {
                    $window.sessionStorage["user"] = JSON.stringify(user);
                    $state.go('app.dashboard');
                    $rootScope.startSession();  //to start session
                }
                deferred.resolve(user);
                function init() {
                    if ($window.sessionStorage["user"]) {
                        user = JSON.parse($window.sessionStorage["user"]);
                    }
                }
                init();
                // $scope.loading=false;

            }, function () {
                $scope.loading=false;
                $scope.shake=true;
                $scope.errorMsg = "Please Enter Valid Email-Id or Password";
                $timeout(function () {
                    delete $scope.errorMsg;
                }, 5000);
                $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
            });
        };
    }

    ApplicationController.$inject = ['$scope', 'AuthService', '$rootScope', '$state', 'AUTH_EVENTS', '$timeout'];
    function ApplicationController($scope, AuthService, $rootScope, $state, AUTH_EVENTS, $timeout) {
        //$scope.currentUser = null;
       // $scope.userRoles = USER_ROLES;
        $scope.isAuthorized = AuthService.isAuthorized;
        $rootScope.$on(AUTH_EVENTS.notAuthorized, function (event, data) {
            $state.go('app.notauthorized');
        });
        $rootScope.$on(AUTH_EVENTS.notAuthenticated, function (event, data) {
            $state.go('page.login'); // 'Emit!'
        });
        $rootScope.$on(AUTH_EVENTS.sessionTimeout, function (event, data) {
            $state.go('page.lock',{sessionTimeout: true}); // 'Emit!'
        });
        $rootScope.$on(AUTH_EVENTS.serverSessionClosed, function (event, data) {
            $state.go('page.login'); // 'Emit!'
            console.log(data);
            $scope.errorMsg = data;
            $timeout(function () {
                delete $scope.errorMsg;
            }, 3000);
        });
        $rootScope.setCurrentUser = function (user) {
            $rootScope.currentUser = user;
        };
        $rootScope.rightClickDisable=function () {
            window.alert("Right click is disabled on this website.");
        }
    }




})();
