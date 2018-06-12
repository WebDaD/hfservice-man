/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-EditMesse', ['$uibModalInstance', 'messe', function ($uibModalInstance, messe) {
      var self = this
      self.messe = messe
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        $uibModalInstance.close(self.messe)
      }
    }])
}())