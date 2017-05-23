/**=========================================================
 * Module: ColorsConstant.js
 =========================================================*/

(function() {
    'use strict';

    angular
        .module('naut')
        .constant('AUTH_EVENTS', {
            // Same values from CSS
            loginSuccess: 'auth-login-success',
            loginFailed: 'auth-login-failed',
            logoutSuccess: 'auth-logout-success',
            sessionTimeout: 'auth-session-timeout',
            notAuthenticated: 'auth-not-authenticated',
            notAuthorized: 'auth-not-authorized',
            serverSessionClosed: 'server-session-closed'
        })
        .constant('USER_ROLES', {
            all: '*',
            Admin: 'Yes',
            Appointments: 'Full',
            Seafarer: 'Full',
            Treatment: 'Full',
            Vessel: 'Full',
            doctor: 'Full',
            medprofile: 'Full',
            VMC: 'Full',
            Billing: 'Full',
            Group: 'Full',
            Notification: 'Full'
        })
    ;
})();
