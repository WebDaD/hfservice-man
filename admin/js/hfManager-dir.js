/* global angular */
;(function () {
  angular.module('hfManager').directive('emitLastRepeaterElement', function () {
    return function (scope) {
      if (scope.$last) {
        scope.$emit('LastRepeaterElement')
      }
    }
  })
})()
