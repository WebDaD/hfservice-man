/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-Thema', ['$scope', 'hfManagerDataProvider', function ($scope, hfManagerDataProvider) {
      var self = this
      self.actions = []
      self.tableParams = {}

      self.isLoading = true
      hfManagerDataProvider.themen().then(function (themen) {
        self.themen = themen.data
        self.isLoading = false
      })

      // TODO: Filter Messe

      // TODO: Modal

      // TODO: New
    }])
}())
