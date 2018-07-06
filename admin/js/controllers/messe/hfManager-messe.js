/* global angular */ ;
(function () {
  angular.module('hfManager')
    .controller('hfManager-Messen', ['$scope', 'hfManagerDataProvider', '$uibModal', function ($scope, hfManagerDataProvider, $uibModal) {
      var self = this

      self.messen = []

      self.sortType = 'titel' // set the default sort type
      self.sortReverse = false // set the default sort order

      self.isLoading = false

      self.loadMessen = function () {
        hfManagerDataProvider.messen().then(function (messen) {
          self.messen = messen.data
          self.messen.forEach(messe => {
            messe.id = parseInt(messe.id)
            messe.sortierung = parseInt(messe.sortierung)
          })
          self.isLoading = false
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
                deletion: false,
                sort: self.maxMesseSort() + 1
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadMessen()
          } else {
            console.error(status)
          }
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
                deletion: false
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
                deletion: false
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadMessen()
          } else {
            console.error(status)
          }
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
            data: function () {
              return {
                disabled: true,
                messe: messe,
                deletion: true
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadMessen()
          } else {
            console.error(status)
          }
        })
      }

      self.messeUp = function (messe) {
        hfManagerDataProvider.changeMesseSort(messe.id, self.sortReverse, true).then(function (result) {
          self.loadMessen()
        })
      }
      self.messeDown = function (messe) {
        hfManagerDataProvider.changeMesseSort(messe.id, self.sortReverse, false).then(function (result) {
          self.loadMessen()
        })
      }
      self.topMesse = function (messe) {
        if (self.sortReverse) { // highest sort is on top
          return messe.sortierung === self.maxMesseSort()
        } else { // lowest sort is on top
          return messe.sortierung === self.minMesseSort()
        }
      }
      self.bottomMesse = function (messe) {
        if (self.sortReverse) { // highest sort is on top
          return messe.sortierung === self.minMesseSort()
        } else { // lowest sort is on top
          return messe.sortierung === self.maxMesseSort()
        }
      }

      self.minMesseSort = function () {
        var min = Number.MAX_SAFE_INTEGER
        self.messen.forEach(messe => {
          if (messe.sortierung < min) {
            min = messe.sortierung
          }
        })
        return min
      }
      self.maxMesseSort = function () {
        var max = 1
        self.messen.forEach(messe => {
          if (messe.sortierung > max) {
            max = messe.sortierung
          }
        })
        return max
      }
      self.loadMessen()
    }])
}())
