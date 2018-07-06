/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-Otone', ['$scope', 'hfManagerDataProvider', '$routeParams', '$uibModal', function ($scope, hfManagerDataProvider, $routeParams, $uibModal) {
      var self = this

      self.isLoading = false

      self.themen = []
      self.messen = []
      self.otone = []

      self.sortType = 'titel' // set the default sort type
      self.sortReverse = false // set the default sort order

      self.sortFilterMesse = $routeParams.messe || '' // set by slug or nothing

      hfManagerDataProvider.messen().then(function (messen) {
        self.messen = messen.data
      })
      hfManagerDataProvider.themen().then(function (themen) {
        self.themen = themen.data
        if ($routeParams.thema) {
          self.sortFilterThema = ''
          self.themen.forEach(thema => {
            if (thema.id === $routeParams.thema) {
              self.sortFilterThema = thema.titel
            }
          })
        }
      })
      self.loadOtone = function () {
        hfManagerDataProvider.otone().then(function (otone) {
          self.otone = otone.data
          self.otone.forEach(oton => {
            oton.id = parseInt(oton.id)
            oton.sortierung = parseInt(oton.sortierung)
          })
          self.isLoading = false
        })
      }
      self.addOton = function () {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/oton/modal.html',
          controller: 'hfManager-OtonModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                oton: {},
                deletion: false,
                thema: self.sortFilterThema,
                messe: self.sortFilterMesse,
                messen: self.messen,
                themen: self.themen,
                sort: self.maxOtonSort() + 1
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadOtone()
          } else {
            console.error(status)
          }
        })
      }
      self.showOton = function (oton) {
        $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/oton/modal.html',
          controller: 'hfManager-OtonModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: true,
                oton: oton,
                deletion: false,
                thema: self.sortFilterThema,
                messe: self.sortFilterMesse,
                messen: self.messen,
                themen: self.themen
              }
            }
          }
        })
      }
      self.editOton = function (oton) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/oton/modal.html',
          controller: 'hfManager-OtonModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: false,
                oton: oton,
                deletion: false,
                thema: self.sortFilterThema,
                messe: self.sortFilterMesse,
                messen: self.messen,
                themen: self.themen
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadOtone()
          } else {
            console.error(status)
          }
        })
      }
      self.deleteOton = function (oton) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/oton/modal.html',
          controller: 'hfManager-OtonModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                disabled: true,
                oton: oton,
                deletion: true,
                thema: self.sortFilterThema,
                messe: self.sortFilterMesse,
                messen: self.messen,
                themen: self.themen
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadOtone()
          } else {
            console.error(status)
          }
        })
      }

      self.otonUp = function (oton) {
        hfManagerDataProvider.changeOtonSort(oton.id, self.sortReverse, true).then(function (result) {
          self.loadOtone()
        })
      }
      self.otonDown = function (oton) {
        hfManagerDataProvider.changeOtonSort(oton.id, self.sortReverse, false).then(function (result) {
          self.loadOtone()
        })
      }
      self.topOton = function (oton) {
        if (self.sortReverse) { // highest sort is on top
          return oton.sortierung === self.maxOtonSort()
        } else { // lowest sort is on top
          return oton.sortierung === self.minOtonSort()
        }
      }
      self.bottomOton = function (oton) {
        if (self.sortReverse) { // highest sort is on top
          return oton.sortierung === self.minOtonSort()
        } else { // lowest sort is on top
          return oton.sortierung === self.maxOtonSort()
        }
      }

      self.minOtonSort = function () {
        var min = Number.MAX_SAFE_INTEGER
        self.otone.forEach(oton => {
          if (oton.sortierung < min) {
            min = oton.sortierung
          }
        })
        return min
      }
      self.maxOtonSort = function () {
        var max = 1
        self.otone.forEach(oton => {
          if (oton.sortierung > max) {
            max = oton.sortierung
          }
        })
        return max
      }
      self.loadOtone()
    }])
}())
