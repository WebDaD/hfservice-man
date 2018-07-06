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
          templateUrl: 'templates/thema/modal.html',
          controller: 'hfManager-ThemaModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                thema: {},
                deletion: false,
                messe: self.sortFilter,
                messen: self.messen,
                sort: self.maxThemaSort() + 1
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadThemen()
          } else {
            console.error(status)
          }
        })
      }
      self.showThema = function (thema) {
        $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/thema/modal.html',
          controller: 'hfManager-ThemaModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: true,
                thema: thema,
                deletion: false,
                messe: self.sortFilter,
                messen: self.messen
              }
            }
          }
        })
      }
      self.editThema = function (thema) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/thema/modal.html',
          controller: 'hfManager-ThemaModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                thema: thema,
                deletion: false,
                messe: self.sortFilter,
                messen: self.messen
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadThemen()
          } else {
            console.error(status)
          }
        })
      }
      self.deleteThema = function (thema) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/thema/modal.html',
          controller: 'hfManager-ThemaModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: true,
                thema: thema,
                deletion: true,
                messe: self.sortFilter,
                messen: self.messen
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadThemen()
          } else {
            console.error(status)
          }
        })
      }

      self.themaUp = function (thema) {
        hfManagerDataProvider.changeThemaSort(thema.id, self.sortReverse, true).then(function (result) {
          self.loadThemen()
        })
      }
      self.themaDown = function (thema) {
        hfManagerDataProvider.changeThemaSort(thema.id, self.sortReverse, false).then(function (result) {
          self.loadThemen()
        })
      }
      self.topThema = function (thema) {
        if (self.sortReverse) { // highest sort is on top
          return thema.sortierung === self.maxThemaSort()
        } else { // lowest sort is on top
          return thema.sortierung === self.minThemaSort()
        }
      }
      self.bottomThema = function (thema) {
        if (self.sortReverse) { // highest sort is on top
          return thema.sortierung === self.minThemaSort()
        } else { // lowest sort is on top
          return thema.sortierung === self.maxThemaSort()
        }
      }

      self.minThemaSort = function () {
        var min = Number.MAX_SAFE_INTEGER
        self.theman.forEach(thema => {
          if (thema.sortierung < min) {
            min = thema.sortierung
          }
        })
        return min
      }
      self.maxThemaSort = function () {
        var max = 1
        self.theman.forEach(thema => {
          if (thema.sortierung > max) {
            max = thema.sortierung
          }
        })
        return max
      }
      self.loadThemen()
    }])
}())
