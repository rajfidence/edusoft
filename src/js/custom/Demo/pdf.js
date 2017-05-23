/**
 * Created by 3 Cube on 1/21/2016.
 */
/*FLEETSCONTROLLER*/

(function () {
    'use strict';

    angular
        .module('naut')
        .controller('pdfcontroller', pdfcontroller);
    pdfcontroller.$inject = ["$scope", "$stateParams", "pdfService", "$rootScope", "toaster", "$state"];
    function pdfcontroller($scope, $stateParams, pdfService, $rootScope, toaster, $state) {
        var vm = this;
        $scope.pdfName = 'Relativity: The Special and General Theory by Albert Einstein';
        $scope.pdfUrl = '';
        $scope.scroll = 0;
        $scope.progress = {};
        $scope.progress.show = false;
        $scope.request = "";
        // $scope.progress.total=100;
        // $scope.loading = true;
        // $scope.totalProgress = 0;
        $scope.SendMail = {};
        $scope.loading=true;
        console.log($stateParams.id);
        vm.pdf = pdfService.pdf($stateParams.page,$stateParams.id).then(function (response) {
                $scope.progress.show =true;
                $scope.pdfUrl = 'server/themes/cleanzone1_3/images/Files/' + response.pdf.Presentation;
                $scope.file = response.pdf;
                $scope.prevNext = response.next;
                console.log(response);
            },
            function (err) {
                console.log('error');
            });
        $scope.getNavStyle = function (scroll) {
            if (scroll > 100) return 'pdf-controls fixed';
            else return 'pdf-controls';
        };

        $scope.onError = function (error) {
            console.log(error);
            $scope.progress.show = false;
        };

        $scope.onLoad = function () {
            $scope.progress.show = false;
            $scope.loading=false;
            $scope.$broadcast('content.changed');
        };

        $scope.onProgress = function (progress) {
            $scope.totalProgress = progress.loaded / progress.total;
            $scope.progress.loaded = progress.loaded;
            $scope.progress.total = progress.total;
            // $scope.progress.show = true;
            console.log(progress);
        };
        $scope.askAnExpert = function () {
            console.log($rootScope.currentUser.session.email_id);
            $scope.SendMail.EmailId = $rootScope.currentUser.session.email_id;
            $scope.SendMail.name = $rootScope.currentUser.user;
            $scope.SendMail.request = $scope.request;
            pdfService.askAnExpert($scope.SendMail)
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
        $scope.page=function(id){
            $state.go('app.files', {id:id});
        };

        $scope.zoomin=function(){
            $scope.zoomIn();
            $scope.$broadcast('content.changed');
        };
        $scope.zoomout=function(){
            $scope.zoomOut();
            $scope.$broadcast('content.changed');
        };
        $scope.fitToScreen=function(){
            $scope.fit();
            $scope.$broadcast('content.changed');
        };
        $scope.key = function($event){
            // alert($event.keyCode);
            if ($event.keyCode == 38)
                 $scope.goPrevious();
            else if ($event.keyCode == 39)
                $scope.goNext();
            else if ($event.keyCode == 40)
                $scope.zoomIn();
            else if ($event.keyCode == 37)
                $scope.zoomOut();
        };
    }

})();

