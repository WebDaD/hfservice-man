/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-Messen', ['$scope', 'hfManagerDataProvider', '$uibModal', function ($scope, hfManagerDataProvider, $uibModal) {
      var self = this

      self.messen = []

      self.sortType = 'titel' // set the default sort type
      self.sortReverse = false // set the default sort order

      self.isLoading = true

      self.loadMessen = function () {
        hfManagerDataProvider.messen().then(function (messen) {
          self.isLoading = false
          self.messen = messen.data
        })
      }
      self.addMesse = function () {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/messe/modal.html',
          controller: 'hfManager-MesseModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                messe: {},
                delete: false
              }
            }
          }
        })
        modalInstance.result.then(function (messe) {
          hfManagerDataProvider.addMesse(messe).then(function (result) {
            self.loadMessen()
          })
        })
      }
      self.showMesse = function (messe) {
        $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/messe/modal.html',
          controller: 'hfManager-MesseModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: true,
                messe: messe,
                delete: false
              }
            }
          }
        })
      }
      self.editMesse = function (messe) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/messe/modal.html',
          controller: 'hfManager-MesseModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                messe: messe,
                delete: false
              }
            }
          }
        })
        modalInstance.result.then(function (messe) {
          hfManagerDataProvider.editMesse(messe.id, messe).then(function (result) {
            self.loadMessen()
          })
        })
      }
      self.deleteMesse = function (messe) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/messe/modal.html',
          controller: 'hfManager-MesseModal',
          controllerAs: 'ctrl',
          resolve: {
            messe: function () {
              return {
                disabled: false,
                messe: messe,
                delete: true
              }
            }
          }
        })
        modalInstance.result.then(function (messe) {
          hfManagerDataProvider.deleteMesse(messe.id).then(function (result) {
            self.loadMessen()
          })
        })
      }

      self.loadMessen()
    }])
}())