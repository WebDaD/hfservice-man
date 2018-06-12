/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-Messen', ['$scope', 'hfManagerDataProvider', '$uibModal', function ($scope, hfManagerDataProvider, $uibModal) {
      var self = this
      self.actions = []
      self.tableParams = {}

      self.sortType = 'titel' // set the default sort type
      self.sortReverse = false // set the default sort order

      self.isLoading = true

      self.loadMessen = function () {
        hfManagerDataProvider.messen().then(function (messen) {
          self.messen = messen.data
          self.isLoading = false
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
          // TODO: save into database and reload page
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
          // TODO: save into database and reload page
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
          // TODO: delete from database and reload page
        })
      }

      self.loadMessen()
    }])
}())