/**=========================================================
 /**=========================================================
 * Module: RoutesConfig.js
 =========================================================*/

(function () {
    'use strict';

    angular
        .module('naut')
        .config(routesConfig);

    routesConfig.$inject = ['$locationProvider', '$stateProvider', '$urlRouterProvider', 'RouteProvider'];
    function routesConfig($locationProvider, $stateProvider, $urlRouterProvider, Route) {

        // use the HTML5 History API
        $locationProvider.html5Mode(false);

        // Default route
        $urlRouterProvider.otherwise('/page/login');

        // Application Routes States
        $stateProvider
            .state('app', {
                url: '/app',
                abstract: true,
                templateUrl: Route.base('app.html'),
                resolve: {
                    _assets: Route.require('icons', 'screenfull', 'sparklines', 'slimscroll', 'toaster', 'animate','angular-intro'),
                    auth: function resolveAuthentication(AuthResolver) {
                        return AuthResolver.resolve();
                    }
                }
            })

            .state('app.dashboard', {
                url: '/dashboard',
                templateUrl: Route.base('dashboard.html'),
                data: {
                    authorizedRoles: ''
                },
                params: {
                    obj: null
                },
                resolve: {
                    assets: Route.require('flot-chart', 'flot-chart-plugins', 'easypiechart')
                }
            })
            .state('app.subscription', {
                url: '/subscription',
                templateUrl: Route.base('subscription.html'),
                data: {
                    authorizedRoles: ''
                },
                params: {
                    obj: null
                },
                resolve: {
                    assets: Route.require('flot-chart', 'flot-chart-plugins', 'easypiechart')
                }
            })
            .state('app.profile', {
                url: '/profile',
                templateUrl: Route.base('profile.html'),
                data: {
                    authorizedRoles: ''
                },
                resolve: {
                    assets: Route.require('flot-chart', 'flot-chart-plugins', 'easypiechart', 'oitozero.ngSweetAlert','ngMessages')
                }
            })
            .state('app.files', {
                url: '/files/:page/:id',

                templateUrl: Route.base('pdf.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'oitozero.ngSweetAlert', 'pdf', 'ngScrollable')
                }
            })
            .state('app.video', {
                url: '/video/:page/:id',
                templateUrl: Route.base('video.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment')
                }
            })
            .state('admin', {
                url: '/admin',
                abstract: true,
                templateUrl: Route.base('admin.html'),
                resolve: {
                    _assets: Route.require('icons', 'screenfull', 'sparklines', 'slimscroll', 'toaster', 'animate','angular-intro'),
                    auth: function resolveAuthentication(AuthResolver) {
                        return AuthResolver.resolve();
                    }
                }
            })
            .state('admin.package', {
                url: '/package',
                templateUrl: Route.base('package_list.html'),
                resolve: {
                    assets: Route.require('moment','datatables', 'ngTable', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment')
                }
            })
            .state('admin.packageAdd', {
                url: '/packageAdd',
                templateUrl: Route.base('package.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.packageUpdate', {
                url: '/packageUpdate/:Id',
                templateUrl: Route.base('package.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.course', {
                url: '/course',
                templateUrl: Route.base('course_list.html'),
                resolve: {
                    assets: Route.require('moment','datatables', 'ngTable', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment')
                }
            })
            .state('admin.courseAdd', {
                url: '/courseAdd',
                templateUrl: Route.base('course.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.courseUpdate', {
                url: '/courseUpdate/:Id',
                templateUrl: Route.base('course.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.chapter', {
                url: '/chapter',
                templateUrl: Route.base('chapter_list.html'),
                resolve: {
                    assets: Route.require('moment','datatables', 'ngTable', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment')
                }
            })
            .state('admin.chapterAdd', {
                url: '/chapterAdd',
                templateUrl: Route.base('chapter.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.chapterUpdate', {
                url: '/chapterUpdate/:Id',
                templateUrl: Route.base('chapter.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.lesson', {
                url: '/lesson',
                templateUrl: Route.base('lesson_list.html'),
                resolve: {
                    assets: Route.require('moment','datatables', 'ngTable', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment')
                }
            })
            .state('admin.lessonAdd', {
                url: '/lessonAdd',
                templateUrl: Route.base('lesson.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.lessonUpdate', {
                url: '/lessonUpdate/:Id',
                templateUrl: Route.base('lesson.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.user', {
                url: '/user',
                templateUrl: Route.base('lesson.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'oitozero.ngSweetAlert', 'ngScrollable','angularMoment','ngMessages')
                }
            })
            .state('admin.userAdd', {
                url: '/userAdd/:Id',
                templateUrl: Route.base('lesson.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('admin.userUpdate', {
                url: '/userUpdate/:Id',
                templateUrl: Route.base('lesson.html'),
                resolve: {
                    assets: Route.require('moment', 'loading-overlay', 'ui.select', 'oitozero.ngSweetAlert', 'ngScrollable','ngVideo','angularMoment','ngMessages')
                }
            })
            .state('page', {
                url: '/page',
                templateUrl: Route.base('page.html'),
                resolve: {
                    assets: Route.require('icons', 'animate')
                }
            })
            .state('page.login', {
                url: '/login',
                templateUrl: Route.base('page.login.html'),
                resolve: {
                    assets: Route.require('toaster','ionicApp')
                },
                data: {
                    authorizedRoles: ''
                }
            })
            .state('page.register', {
                url: '/register',
                templateUrl: Route.base('page.register.html'),
                data: {
                    authorizedRoles: ''
                }
            })
            .state('page.recover', {
                url: '/recover',
                templateUrl: Route.base('page.recover.html')
            })
            .state('page.newpassword', {
                url: '/newpassword/:resetid',
                templateUrl: Route.base('page.newpassword.html')
            })
            .state('page.lock', {
                url: '/lock',
                params: {
                    sessionTimeout: false
                },
                templateUrl: Route.base('page.lock.html'),
                resolve: {
                    assets: Route.require('toaster','ionicApp')
                }
            })
    }

})();

