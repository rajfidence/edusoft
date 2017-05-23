angular.module('ionicApp', [])
    .directive('shakeMe', ['$animate', '$timeout', '$compile', '$log', function ($animate, $timeout, $compile, $log) {
        return {
            restrict: 'A',
            // replace: true,
            scope: {
                shakeThis: '=',
                shakeError: '='
            },
            link: function (scope, element, attrs, form) {
                scope.$watch('shakeThis', function (v) {
                    $timeout(function () {
                        if (v) {
                            var shakeClass=(scope.shakeError)?'shake shakeError':'shake';
                            $animate.addClass(element, shakeClass).then(function () {
                                element.removeClass('shake');
                                scope.shakeThis = false;
                            });
                        }
                    });
                }, true);
            }
        };
    }]);