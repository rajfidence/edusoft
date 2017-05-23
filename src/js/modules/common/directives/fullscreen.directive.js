/**=========================================================
 * Module: FullscreenDirective
 * Toggle the fullscreen mode on/off
 =========================================================*/

(function() {
    'use strict';

    angular
        .module('naut')
        .directive('toggleFullscreen', toggleFullscreen);
    
    function toggleFullscreen() {

      return {
        restrict: 'A',
        link: link
      };

      function link(scope, element, attrs) {

        if (screenfull.enabled) {
          console.log(screenfull);
          element.on('click', function (e) {
            e.preventDefault();

            screenfull.toggle(this);

            var icon = angular.element(this).find('em');
            // Switch icon indicator
            if(screenfull.isFullscreen)
              icon.removeClass('fa-expand').addClass('fa-compress');
            else
              icon.removeClass('fa-compress').addClass('fa-expand');
          
          });

        } else {
          element.remove();
        }
      }
    }

})();
