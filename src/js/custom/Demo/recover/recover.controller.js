/**
 * Created by 3 Cube on 8/23/2016.
 */
(function () {
    'use strict';

    angular
        .module('naut')
        .controller('passwordrecoverController', passwordrecoverController)
    ;
    passwordrecoverController.$inject = ['$rootScope', '$scope', 'passrecovery', '$stateParams'];
    function passwordrecoverController($rootScope, $scope, passrecovery, $stateParams) {
        var vm = this;
        $scope.username = '';
        $scope.shake=false;
        $scope.sendmail = function () {
            if(vm.recoveryForm.$valid){
                passrecovery.sendreq($scope.username).then(function (res) {
                    $scope.message = res;
                },function(err){
                    $scope.shake=true;
                    $scope.message = err.response;

                })
            }
        }

        $scope.conform = function() {
            $scope.errorMsg='';
            $scope.resetid = $stateParams.resetid;
            var pass1 = $scope.pass.password1;
            var pass2 = $scope.pass.password2;

            passrecovery.passwordkeystatus($scope.resetid)
                .then(function(res){
                    console.log(res);
                    $scope.changepassword();
                }, function(err){
                    $scope.errorMsg = err.response;
                });
            $scope.changepassword = function() {
                if(pass1 != pass2){
                    $scope.errorMsg = "Password did Not Match"
                } else {
                    passrecovery.newpassword($scope.resetid, pass1)
                        .then(function(res){
                            $scope.disablefields=true;
                            $scope.loginpath=true;
                        }, function(err){
                            $scope.errorMsg = err.response;
                        })
                }
            }

        }
        
        
    }
    
})();