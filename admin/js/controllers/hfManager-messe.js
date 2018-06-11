/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-Messen', ['$scope', 'hfManagerDataProvider', function ($scope, hfManagerDataProvider) {
      var self = this
      self.actions = []
      self.tableParams = {}

      self.isLoading = true
      hfManagerDataProvider.messen().then(function (messen) {
        self.messen = messen.data
        self.isLoading = false
      })

      // TODO: Modal

      // TODO: New
    }])
}())
