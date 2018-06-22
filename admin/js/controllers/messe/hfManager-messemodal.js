/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-MesseModal', ['$uibModalInstance', 'data', function ($uibModalInstance, data) {
      var self = this
      self.disabled = data.disabled
      self.messe = data.messe || {}
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        $uibModalInstance.close(self.messe)
      }
      self.delete = function () {
        $uibModalInstance.close(true)
      }
    }])
}())