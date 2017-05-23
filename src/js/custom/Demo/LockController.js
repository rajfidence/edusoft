(function () {
    'use strict';

    angular
        .module('naut')
        .controller('LockController', LockController);


    LockController.$inject = ['$scope', 'AuthService', '$state', '$window', 'Session', '$rootScope', 'toaster'];
    function LockController($scope, AuthService, $state, $window, Session, $rootScope, toaster) {
        var user = JSON.parse($window.sessionStorage["user"]);
        Session.destroy();
        $scope.shake = false;
        user.role = null;
        if ($state.params.sessionTimeout === true) {
            toaster.error({title: "Session Timeout", body: "Your session has timed out. Please login again."});
        }
        $window.sessionStorage["user"] = JSON.stringify(user);
        $scope.label = 'Label';
        $scope.unlock = function (credentials) {
            var userDetails = JSON.parse($window.sessionStorage["user"]);
            credentials.username = userDetails.session.email_id;
            AuthService.unlock(credentials).then(function (user) {
                $window.sessionStorage["user"] = JSON.stringify(user);
                // if (typeof $rootScope.start == 'function')
                 $rootScope.startSession(); // to start session again
                if (user.role != null) {
                    $window.history.back();
                }
            }, function () {
                $scope.shake = true;
                $scope.errorMsg = "Password not correct";
            });
        };

        $scope.userinfo = {};
        var user_details = JSON.parse($window.sessionStorage["user"]);
        $scope.userinfo.u_name = user_details.session.u_name;
    }

})();

