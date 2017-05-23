/**
 * Created by 3 Cube on 1/21/2016.
 */
/*FLEETSCONTROLLER*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('videocontroller', videocontroller);
    videocontroller.$inject = ["$scope", "$stateParams", "$rootScope", "toaster", "pdfService", "video"];
    function videocontroller($scope, $stateParams, $rootScope, toaster, pdfService, video) {
        var vm = this;
        $scope.messages = [];
        // $scope.videos = {first:'http://edusoft.edudoc.in/server/themes/cleanzone1_3/images/Files/US_Healthcare.mp4'};
        /**
         * @property videos
         * @type {Object}
         */
        console.log($rootScope.currentUser.session);
        $scope.askAnExpert = function () {

            $scope.SendMail.EmailId = $rootScope.currentUser.session.email_id;
            $scope.SendMail.name = $rootScope.currentUser.user;
            $scope.SendMail.request = $scope.request;
            pdfService.askAnExpert($scope.SendMail)
                .then(function (result) {
                        // $scope.file = response.pdf;
                        // $scope.videos={first:response.video};
                        // $scope.MailSent = result;
                        // toaster.success({title: "Success", body: result});
                        // console.log($scope.videoList);
                    },
                    function (err) {
                        // console.log(err);
                        toaster.error({title: "Error", body: err});
                    });
        };
        vm.pdf = pdfService.pdf($stateParams.page, $stateParams.id).then(function (response) {
                // $scope.progress.show =true;
                // $scope.pdfUrl = 'server/themes/cleanzone1_3/images/Files/' + response.pdf.Presentation;
                $scope.file = response.pdf;
                $scope.videos = {first: 'http://edusoft.edudoc.in/server/themes/cleanzone1_3/images/Files/' + response.pdf.Video};
                $scope.playVideo = function playVideo(sourceUrl) {
                    video.addSource('mp4', sourceUrl, true);
                };
                /**
                 * @method getVideoName
                 * @param videoModel {Object}
                 * @return {String}
                 */
                $scope.getVideoName = function getVideoName(videoModel) {

                    switch (videoModel.src) {
                        case ($scope.videos.first):
                            return response.pdf.name;
                        // case ($scope.videos.second): return "The Bear";
                        default:
                            return "Unknown Video";
                    }

                };

                // Add some video sources for the player!
                video.addSource('mp4', $scope.videos.first);
                // video.addSource('mp4', $scope.videos.second);
                console.log($scope.videos);
            },
            function (err) {
                console.log('error');
            });
        // $scope.messages = [
        //     {
        //         time: '2016-12-26 12:00:00',
        //         name: 'Cassandra Gutierrez',
        //         content: 'Vivamus fermentum libero vel felis aliquet interdum. Nulla mauris sem, hendrerit sed fringilla a, facilisis vitae eros. .',
        //         avatar: 'app/img/user/03.jpg',
        //         position: 'left'
        //     },
        //     {
        //         time: '2016-12-26 12:00:00',
        //         name: 'Ramona Stevens',
        //         content: 'Donec consequat venenatis orci, et sagittis risus pretium eget.',
        //         avatar: 'app/img/user/02.jpg',
        //         position: 'right'
        //     },
        //     {
        //         time: '2016-12-26 12:00:00',
        //         name: 'Sara Jimenez',
        //         content: 'Curabitur sit amet lacus id odio volutpat faucibus nec quis enim. Donec gravida metus dictum sapien auctor eu egestas mauris hendrerit. ',
        //         avatar: 'app/img/user/02.jpg',
        //         position: 'right'
        //     },
        //     {
        //         time: '2016-12-26 12:00:00',
        //         name: 'Peter Porter',
        //         content: 'Integer venenatis ultrices vulputate. ',
        //         avatar: 'app/img/user/03.jpg',
        //         position: 'left'
        //     },
        //     {
        //         time: '2016-12-25 12:00:00',
        //         name: 'Karl Kennedy',
        //         content: 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In at consequat nibh. ',
        //         avatar: 'app/img/user/02.jpg',
        //         position: 'right'
        //     }
        // ];

        vm.comments = function() {
            pdfService.comments($stateParams.page, $stateParams.id).then(function (response) {
                    $scope.messages = response.video;
                },
                function (err) {
                    console.log('error');
                });
        };
        vm.comments();
        setInterval(function(){
            console.log('test');
            vm.comments();
        }, 5000);

        $scope.addMessage = function () {
            console.log($scope.currMessage);
            if (!$scope.currMessage || $scope.currMessage.length === 0) {
                return;
            }

            $scope.messages.push({
                CommentDateTime: Math.floor(Date.now() / 1000),
                FirstName: $rootScope.currentUser.session.FirstName,
                LastName: $rootScope.currentUser.session.LastName,
                Comment: $scope.currMessage,
                avatar: 'app/img/user/02.jpg',
                position: 'right'
            });

            var addComments = {page: $stateParams.page, id: $stateParams.id, message: $scope.currMessage};
            pdfService.addComments(addComments)
                .then(function (result) {
                        $scope.currMessage = '';
                    },
                    function (err) {
                        // console.log(err);
                        toaster.error({title: "Error", body: err});
                    });
        };

        $scope.time = new Date();
        // $scope.videos = {
        //     first:  'http://www.w3schools.com/html/mov_bbb.mp4',
        //     second: 'http://www.w3schools.com/html/movie.mp4'
        // };

    }

})();

