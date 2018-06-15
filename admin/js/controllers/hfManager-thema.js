/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-Thema', ['$scope', 'hfManagerDataProvider', '$uibModal', '$routeParams', function ($scope, hfManagerDataProvider, $uibModal, $routeParams) {
      var self = this

      self.themen = []
      self.messen = []
      self.sortType = 'titel' // set the default sort type
      self.sortReverse = false // set the default sort order

      self.sortFilter = $routeParams.messe || '' // set by slug or nothing

      hfManagerDataProvider.messen().then(function (messen) {
        self.messen = messen.data
      })

      self.isLoading = true
      self.loadThemen = function () {
        hfManagerDataProvider.themen().then(function (themen) {
          self.isLoading = false
          self.themen = themen.data
        })
      }

      self.addThema = function () {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/modals/addThema.html',
          controller: 'hfManager-AddThema',
          controllerAs: 'ctrl'
        })
        modalInstance.result.then(function (thema) {
          hfManagerDataProvider.addThema(thema).then(function (result) {
            self.loadThemen()
          })
        })
      }
      self.showThema = function (thema) {
        $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/modals/showThema.html',
          controller: 'hfManager-ShowThema',
          controllerAs: 'ctrl',
          resolve: {
            thema: function () {
              return thema
            }
          }
        })
      }
      self.editThema = function (thema) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/modals/editThema.html',
          controller: 'hfManager-EditThema',
          controllerAs: 'ctrl',
          resolve: {
            thema: function () {
              return thema
            }
          }
        })
        modalInstance.result.then(function (thema) {
          hfManagerDataProvider.editThema(thema.id, thema).then(function (result) {
            self.loadThemen()
          })
        })
      }
      self.deleteThema = function (thema) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/modals/deleteThema.html',
          controller: 'hfManager-DeleteThema',
          controllerAs: 'ctrl',
          resolve: {
            thema: function () {
              return thema
            }
          }
        })
        modalInstance.result.then(function (thema) {
          hfManagerDataProvider.deleteThema(thema.id).then(function (result) {
            self.loadThemen()
          })
        })
      }

      self.loadThemen()
    }])
}())