/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-MesseModal', ['$uibModalInstance', 'data', function ($uibModalInstance, data) {
      var self = this
      self.disabled = data.disabled
      self.deletion = data.deletion
      self.messe = data.messe || {}
      if (!self.messe.titel) {
        self.title = 'Neue Messe'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else if (self.deletion) {
        self.title = 'Messe löschen'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Ja'
      } else if (!self.disabled) {
        self.title = 'Messe bearbeiten'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else {
        self.title = 'Details zur ' + self.messe.titel
        self.cancel = 'Schließen'
        self.saveButton = 'Schließen'
      }
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
