/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('DashboardController', DashboardController)
        .directive('whenScrolled', function () {
            return function (scope, elm, attr) {
                var raw = elm[0];

                elm.bind('scroll', function () {
                    if (raw.scrollTop + raw.offsetHeight >= raw.scrollHeight) {
                        scope.$apply(attr.whenScrolled);
                    }
                });
            };
        })
    ;


    DashboardController.$inject = ['$rootScope', '$scope', '$state', 'intro', 'notificationservice', 'toaster','$timeout'];
    function DashboardController($rootScope, $scope, $state, intro, notificationservice, toaster,$timeout) {

        var vm = this;
        $scope.CurrentDate = '';
        $scope.coursedetails = {};
        $scope.videoList = {};
        $scope.SendMail = {};
        $scope.request = "";
        // console.log($state.params.obj);
        // toaster.success("Profile was successfully edited.");
        $timeout(function() {
            if ($state.params.obj == 'Edited') {
                toaster.success({title: "Success", body: "Profile edited successfully."});
            }
        }, 0);

        vm.getAlbums = notificationservice.GetCourse()
            .then(function (DashBoardData) {
                    $scope.coursedetails = DashBoardData;
                },
                function (err) {
                    console.log(err)
                });


        $scope.askAnExpert = function () {

            $scope.SendMail.EmailId = $rootScope.currentUser.session.email_id;
            $scope.SendMail.name = $rootScope.currentUser.session.FirstName+ ' '+$rootScope.currentUser.session.LastName;
            $scope.SendMail.request = $scope.request;
            console.log($scope.SendMail);
            notificationservice.askAnExpert($scope.SendMail)
                .then(function (result) {
                        $scope.MailSent = result;
                        toaster.success({title: "Success", body: result});
                    },
                    function (err) {
                        // console.log(err);
                        toaster.error({title: "Error", body: err});
                    });
        };

        vm.getVideos = notificationservice.GetVideos()
            .then(function (DashBoardData) {

                    $scope.videoList = DashBoardData;
                    // console.log($scope.videoList);
                },
                function (err) {
                    console.log(err)
                });

        //------------------------ code for Angular Intro----------
        $rootScope.IntroOptions = "";
        $rootScope.IntroOptions = {
            steps: intro.dashboard,
            showStepNumbers: false,
            exitOnOverlayClick: true,
            exitOnEsc: true,
            nextLabel: '<strong>NEXT!</strong>',
            prevLabel: '<span style="color:green">Previous</span>',
            skipLabel: 'Exit',
            doneLabel: 'Thanks'
        };

        $rootScope.CompletedEvent = function (scope) {
            console.log("Completed Event called");
        };

        $rootScope.ExitEvent = function (scope) {
            console.log("Exit Event called");
        };

        $rootScope.ChangeEvent = function (targetElement, scope) {
            console.log("Change Event called");
            console.log(targetElement);  //The target element
            console.log(this);  //The IntroJS object
        };

        $rootScope.BeforeChangeEvent = function (targetElement, scope) {
            console.log("Before Change Event called");
            console.log(targetElement);
        };

        $rootScope.AfterChangeEvent = function (targetElement, scope) {
            console.log("After Change Event called");
            console.log(targetElement);
        };


    }


})();
