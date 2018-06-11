/* global angular */
;(function () {
  angular.module('hfManager')
    .controller('hfManager-Otone', ['$scope', 'hfManagerDataProvider', function ($scope, hfManagerDataProvider) {
      var self = this
      self.actions = []
      self.tableParams = {}

      self.isLoading = true
      hfManagerDataProvider.otone().then(function (otone) {
        self.otone = otone.data
        self.isLoading = false
      })

      // TODO: Filter Messe

      // TODO: Filter Thema

      // TODO: Modal

      // TODO: New
    }])
}())
