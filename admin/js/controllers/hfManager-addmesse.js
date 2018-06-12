/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-AddMesse', ['$uibModalInstance', function ($uibModalInstance) {
      var self = this
      self.messe = {}
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        $uibModalInstance.close(self.messe)
      }
    }])
}())