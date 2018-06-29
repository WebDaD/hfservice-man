/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-UserModal', ['$uibModalInstance', 'data', 'hfManagerDataProvider', function ($uibModalInstance, data, hfManagerDataProvider) {
      var self = this
      self.check = false
      self.deletion = data.deletion
      self.user = data.user || {}
      if (!self.user.titel) {
        self.title = 'Neuer User'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else if (self.deletion) {
        self.title = 'User loeschen'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Ja'
      } else if (!self.disabled) {
        self.title = 'User bearbeiten'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else {
        self.title = 'Details zu ' + self.user.titel
        self.cancel = 'Schliessen'
        self.saveButton = 'Schliessen'
      }
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        if (validate()) {
          if (self.user.id) {
            hfManagerDataProvider.updateUser(self.user.id, self.user).then(function (result) {
              $uibModalInstance.close(true)
            }, function (error) {
              self.error = true
              self.errorText = error.data.error
            })
          } else {
            hfManagerDataProvider.addUser(self.user).then(function (result) {
              $uibModalInstance.close(true)
            }, function (error) {
              self.error = true
              self.errorText = error.data.error
            })
          }
        } else {
          self.error = true
          self.errorText = 'Fehlende Eingaben'
        }
      }

      function validate () {
        if (!self.user.login ||
            !self.user.password) {
          return false
        } else {
          return true
        }
      }
      self.delete = function () {
        hfManagerDataProvider.deleteUser(self.user.id).then(function (result) {
          $uibModalInstance.close(true)
        }, function (error) {
          self.error = true
          self.errorText = error.data.error
        })
      }
    }])
}())
