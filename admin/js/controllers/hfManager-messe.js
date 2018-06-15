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
          templateUrl: 'templates/modals/addMesse.html',
          controller: 'hfManager-AddMesse',
          controllerAs: 'ctrl'
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
          templateUrl: 'templates/modals/showMesse.html',
          controller: 'hfManager-ShowMesse',
          controllerAs: 'ctrl',
          resolve: {
            messe: function () {
              return messe
            }
          }
        })
      }
      self.editMesse = function (messe) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/modals/editMesse.html',
          controller: 'hfManager-EditMesse',
          controllerAs: 'ctrl',
          resolve: {
            messe: function () {
              return messe
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
          templateUrl: 'templates/modals/deleteMesse.html',
          controller: 'hfManager-DeleteMesse',
          controllerAs: 'ctrl',
          resolve: {
            messe: function () {
              return messe
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