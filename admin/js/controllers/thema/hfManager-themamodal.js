/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-ThemaModal', ['$uibModalInstance', 'data', 'FileUploader', 'hfManagerDataProvider', function ($uibModalInstance, data, FileUploader, hfManagerDataProvider) {
      var self = this
      self.check = false
      self.uploaderPDF = new FileUploader(
        {
          url: '/admin/upload.php',
          onAfterAddingFile: function (item) {
            self.messe.pdf = item.file.name
          }
        }
      )
      self.disabled = data.disabled
      self.deletion = data.deletion
      self.thema = data.thema || {}
      self.messen = data.messen
      if (!self.thema.titel) {
        self.title = 'Neues Thema'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else if (self.deletion) {
        self.title = 'Thema loeschen'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Ja'
      } else if (!self.disabled) {
        self.title = 'Thema bearbeiten'
        self.cancel = 'Abbrechen'
        self.saveButton = 'Speichern'
      } else {
        self.title = 'Details zu ' + self.thema.titel
        self.cancel = 'Schliessen'
        self.saveButton = 'Schliessen'
      }
      if (!self.thema.messe) {
        self.thema.messe = data.messe
      }
      if (!self.thema.sortierung) {
        self.thema.sortierung = data.sort
      }
      self.close = function () {
        $uibModalInstance.dismiss('cancel')
      }
      self.save = function () {
        if (self.uploaderPDF.queue.length > 0) {
          pdfUpload()
        } else {
          updateOrInsert(self.thema.id, self.thema)
        }
      }
      function pdfUpload () {
        self.uploaderPDF.queue[0].onSuccess = function (response, status, headers) {
          updateOrInsert(self.thema.id, self.thema)
        }
        self.uploaderPDF.queue[0].onError = function (response, status, headers) {
          self.error = true
          self.errorText = response
        }
        self.uploaderPDF.queue[0].upload()
      }
      function updateOrInsert (id, thema) {
        if (validate()) {
          self.messen.forEach(messe => {
            if (messe.slug === thema.messe) {
              thema.messe = messe.id
            }
          })
          if (id) {
            hfManagerDataProvider.updateThema(thema.id, thema).then(function (result) {
              $uibModalInstance.close(true)
            }, function (error) {
              self.error = true
              self.errorText = error.data.error
            })
          } else {
            hfManagerDataProvider.addThema(thema).then(function (result) {
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
        if (!self.thema.titel) {
          return false
        } else {
          return true
        }
      }
      self.delete = function () {
        hfManagerDataProvider.deleteThema(self.thema.id).then(function (result) {
          $uibModalInstance.close(true)
        }, function (error) {
          self.error = true
          self.errorText = error.data.error
        })
      }
    }])
}())
