/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-User', ['$scope', 'hfManagerDataProvider', '$uibModal', function ($scope, hfManagerDataProvider, $uibModal) {
      var self = this
      self.users = []

      self.isLoading = true
      self.loadUsers = function () {
        hfManagerDataProvider.user().then(function (user) {
          self.user = user.data
          self.isLoading = false
        })
      }
      self.addMesse = function () {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/user/modal.html',
          controller: 'hfManager-UserModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                user: {},
                deletion: false
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadUsers()
          } else {
            console.error(status)
          }
        })
      }
      self.editUser = function (user) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/user/modal.html',
          controller: 'hfManager-UserModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                user: user,
                deletion: false
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadUsers()
          } else {
            console.error(status)
          }
        })
      }
      self.deleteUser = function (user) {
        var modalInstance = $uibModal.open({
          animation: false,
          size: 'lg',
          templateUrl: 'templates/user/modal.html',
          controller: 'hfManager-UserModal',
          controllerAs: 'ctrl',
          resolve: {
            data: function () {
              return {
                user: user,
                deletion: true
              }
            }
          }
        })
        modalInstance.result.then(function (status) {
          if (status === true) {
            self.loadUsers()
          } else {
            console.error(status)
          }
        })
      }
      self.loadUsers()
    }])
}())
