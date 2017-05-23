/**=========================================================
 * Module: DashboardController.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .service('HttpFactory', HttpFactory);
    HttpFactory.$inject = ['$rootScope', '$http', '$q'];
    function HttpFactory( $rootScope, $http, $q) {
        var vm =this;
        vm.post={
            url:'',
            data:'',

        };
    }

})();
