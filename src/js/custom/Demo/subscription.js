/**
 * Created by 3 Cube on 1/21/2016.
 */
/*FLEETSCONTROLLER*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('subscriptionController', subscriptionController);
    subscriptionController.$inject = ['intro', '$rootScope', '$scope', '$state', 'toaster', 'subscriptionService'];
    function subscriptionController(intro, $rootScope, $scope, $state, toaster, subscriptionService) {
        var vm = this;
        $scope.subscription = {};
        $scope.SendMail = {};
        $scope.request="Test";
        // vm.sub = subscriptionService.subscriptions().then(function (response) {
        //         console.log(response);
        //         $scope.subscription = response;
        //     },
        //     function (err) {
        //     });
        // vm.video = subscriptionService.videolist().then(function (response) {
        //         console.log(response);
        //         $scope.videolist = response;
        //     },
        //     function (err) {
        //     });
        vm.presntation = subscriptionService.presentationList().then(function (response) {
                console.log(response);
                $scope.presentationList = response;
            },
            function (err) {
            });
        $scope.askAnExpert = function () {
            console.log($rootScope.currentUser.session.email_id);
            $scope.SendMail.EmailId = $rootScope.currentUser.session.email_id;
            $scope.SendMail.name = $rootScope.currentUser.user;
            $scope.SendMail.request = $scope.request;
            subscriptionService.askAnExpert($scope.SendMail)
                .then(function (result) {
                        $scope.MailSent = result;
                        toaster.success({title: "Success", body: result});
                        // console.log($scope.videoList);
                    },
                    function (err) {
                        // console.log(err);
                        toaster.error({title: "Error", body: err});
                    });
        };

    }

})();

