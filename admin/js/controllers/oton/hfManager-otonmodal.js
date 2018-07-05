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
      self.messen = data.messen
      self.themen = data.themen
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
      if (!self.oton.messe) {
        self.oton.messe = data.messe
      }
      if (!self.oton.thema) {
        self.oton.thema = data.thema
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
        if (self.uploaderbild.queue.length > 0) {
          self.uploaderbild.queue[0].onSuccess = function (response, status, headers) {
            if (self.uploaderMP3.queue.length > 0) {
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
        } else {
          if (self.uploaderMP3.queue.length > 0) {
            mp3Upload()
          } else {
            updateOrInsert(self.oton.id, self.oton)
          }
        }
      }
      function mp3Upload () {
        if (self.uploaderMP3.queue.length > 0) {
          self.uploaderMP3.queue[0].onSuccess = function (response, status, headers) {
            updateOrInsert(self.oton.id, self.oton)
          }
          self.uploaderMP3.queue[0].onError = function (response, status, headers) {
            self.error = true
            self.errorText = response
          }
          self.uploaderMP3.queue[0].upload()
        } else {
          updateOrInsert(self.oton.id, self.oton)
        }
      }
      function updateOrInsert (id, oton) {
        if (validate()) {
          self.messen.forEach(messe => {
            if (messe.slug === oton.messe) {
              oton.messe = messe.id
            }
          })
          self.themen.forEach(thema => {
            if (thema.titel === oton.thema) {
              oton.thema = thema.id
            }
          })
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
            !self.oton.text ||
            !self.oton.thema ||
            !self.oton.messe) {
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
