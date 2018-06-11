/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-User', ['$scope', 'hfManagerDataProvider', function ($scope, hfManagerDataProvider) {
      var self = this
      self.actions = []
      self.tableParams = {}

      self.isLoading = true
      hfManagerDataProvider.user().then(function (user) {
        self.user = user.data
        self.isLoading = false
      })

      // TODO: Modal

      // TODO: New
    }])
}())
