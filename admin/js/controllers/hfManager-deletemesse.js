/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-DeleteMesse', ['$uibModalInstance', 'messe', function ($uibModalInstance, messe) {
      var self = this
      self.messe = messe
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.delete = function () {
        $uibModalInstance.close(true)
      }
    }])
}())