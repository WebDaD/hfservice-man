/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-MesseModal', ['$uibModalInstance', 'data', 'FileUploader', 'hfManagerDataProvider', function ($uibModalInstance, data, FileUploader, hfManagerDataProvider) {
      var self = this
      self.check = false
      self.uploaderLogo = new FileUploader(
        {
          url: '/admin/upload.php',
          onAfterAddingFile: function (item) {
            self.messe.bild = item.file.name
          }
        }
      )
      self.uploaderPDF = new FileUploader(
        {
          url: '/admin/upload.php',
          onAfterAddingFile: function (item) {
            self.messe.themenservice = item.file.name
          }
        }
      )
      self.disabled = data.disabled
      self.deletion = data.deletion
      self.messe = data.messe || {}
      self.messe.kontakt_aktiv = self.messe.kontakt_aktiv === '1'
      self.messe.presseteam = self.messe.presseteam === '1'
      if (!self.messe.titel) {
        self.title = 'Neue Messe'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else if (self.deletion) {
        self.title = 'Messe loeschen'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Ja'
      } else if (!self.disabled) {
        self.title = 'Messe bearbeiten'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else {
        self.title = 'Details zur ' + self.messe.titel
        self.cancel = 'Schliessen'
        self.saveButton = 'Schliessen'
      }
      if (!self.messe.sortierung) {
        self.messe.sortierung = data.sort
      }
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        if (self.uploaderLogo.queue.length > 0) {
          bildUpload()
        } else {
          updateOrInsert(self.messe.id, self.messe)
        }
      }
      function bildUpload () {
        if (self.uploaderLogo.queue.length > 0) {
          self.uploaderLogo.queue[0].onSuccess = function (response, status, headers) {
            if (self.uploaderPDF.queue.length > 0) {
              themenUpload()
            } else {
              updateOrInsert(self.messe.id, self.messe)
            }
          }
          self.uploaderLogo.queue[0].onError = function (response, status, headers) {
            self.error = true
            self.errorText = response
          }
          self.uploaderLogo.queue[0].upload()
        } else {
          if (self.uploaderPDF.queue.length > 0) {
            themenUpload()
          } else {
            updateOrInsert(self.messe.id, self.messe)
          }
        }
      }
      function themenUpload () {
        if (self.uploaderPDF.queue.length > 0) {
          self.uploaderPDF.queue[0].onSuccess = function (response, status, headers) {
            updateOrInsert(self.messe.id, self.messe)
          }
          self.uploaderPDF.queue[0].onError = function (response, status, headers) {
            self.error = true
            self.errorText = response
          }
          self.uploaderPDF.queue[0].upload()
        } else {
          updateOrInsert(self.messe.id, self.messe)
        }
      }
      function updateOrInsert (id, messe) {
        self.messe.kontakt_aktiv = self.messe.kontakt_aktiv ? '1' : '0'
        self.messe.presseteam = self.messe.presseteam ? '1' : '2'
        if (validate()) {
          if (id) {
            hfManagerDataProvider.updateMesse(messe.id, messe).then(function (result) {
              $uibModalInstance.close(true)
            }, function (error) {
              self.error = true
              self.errorText = error.data.error
            })
          } else {
            hfManagerDataProvider.addMesse(messe).then(function (result) {
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
        if (!self.messe.titel ||
            !self.messe.slug ||
            !self.messe.bild ||
            !self.messe.link ||
            !self.messe.datum ||
            !self.messe.enddatum) {
          return false
        } else {
          return true
        }
      }
      self.delete = function () {
        hfManagerDataProvider.deleteMesse(self.messe.id).then(function (result) {
          $uibModalInstance.close(true)
        }, function (error) {
          self.error = true
          self.errorText = error.data.error
        })
      }
    }])
}())
