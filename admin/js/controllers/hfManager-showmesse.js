/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-ShowMesse', ['$uibModalInstance', 'messe', function ($uibModalInstance, messe) {
      var self = this
      self.messe = messe
      self.close = function () {
        $uibModalInstance.close()
      }
    }])
}())