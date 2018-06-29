/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-OtonModal', ['$uibModalInstance', 'data', 'FileUploader', 'hfManagerDataProvider', function ($uibModalInstance, data, FileUploader, hfManagerDataProvider) {
      var self = this
      self.check = false
      self.uploaderbild = new FileUploader(
        {
          url: '/admin/upload.php',
          onAfterAddingFile: function (item) {
            self.oton.bild = item.file.name
          }
        }
      )
      self.uploaderMP3 = new FileUploader(
        {
          url: '/admin/upload.php',
          onAfterAddingFile: function (item) {
            self.oton.mp3 = item.file.name
          }
        }
      )
      self.disabled = data.disabled
      self.deletion = data.deletion
      self.oton = data.oton || {}
      if (!self.oton.titel) {
        self.title = 'Neuer O-Ton'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else if (self.deletion) {
        self.title = 'O-Ton loeschen'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Ja'
      } else if (!self.disabled) {
        self.title = 'O-Ton bearbeiten'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else {
        self.title = 'Details zu ' + self.oton.titel
        self.cancel = 'Schliessen'
        self.saveButton = 'Schliessen'
      }
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        if (self.uploaderbild.queue.length > 0) {
          bildUpload()
        } else {
          updateOrInsert(self.oton.id, self.oton)
        }
      }
      function bildUpload () {
        self.uploaderbild.queue[0].onSuccess = function (response, status, headers) {
          if (self.uploaderbild.queue.length > 0) {
            mp3Upload()
          } else {
            updateOrInsert(self.oton.id, self.oton)
          }
        }
        self.uploaderbild.queue[0].onError = function (response, status, headers) {
          self.error = true
          self.errorText = response
        }
        self.uploaderbild.queue[0].upload()
      }
      function mp3Upload () {
        self.uploaderMP3.queue[0].onSuccess = function (response, status, headers) {
          updateOrInsert(self.oton.id, self.oton)
        }
        self.uploaderMP3.queue[0].onError = function (response, status, headers) {
          self.error = true
          self.errorText = response
        }
        self.uploaderMP3.queue[0].upload()
      }
      function updateOrInsert (id, oton) {
        if (validate()) {
          if (id) {
            hfManagerDataProvider.updateOton(oton.id, oton).then(function (result) {
              $uibModalInstance.close(true)
            }, function (error) {
              self.error = true
              self.errorText = error.data.error
            })
          } else {
            hfManagerDataProvider.addOton(oton).then(function (result) {
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
        if (!self.oton.titel ||
            !self.oton.themen_id) {
          return false
        } else {
          return true
        }
      }
      self.delete = function () {
        hfManagerDataProvider.deleteOton(self.oton.id).then(function (result) {
          $uibModalInstance.close(true)
        }, function (error) {
          self.error = true
          self.errorText = error.data.error
        })
      }
    }])
}())
