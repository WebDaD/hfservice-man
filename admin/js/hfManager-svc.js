/* global angular */
;(function () {
  angular.module('hfManager')
    .provider('hfManagerDataProvider', function hfManagerDataProvider () {
      var restURL = '/api.php'
      this.setURL = function (url) {
        restURL = url
      }
      this.$get = function ($http) {
        return {
          user: function () {
            return $http({
              method: 'GET', url: restURL + '?object=user'
            })
          },
          messen: function () {
            return $http({
              method: 'GET', url: restURL + '?object=messe'
            })
          },
          addMesse: function (messe) {
            return $http({
              method: 'POST', url: restURL + '?object=messe', data: {messe: messe}
            })
          },
          updateMesse: function (id, messe) {
            return $http({
              method: 'PUT', url: restURL + '?object=messe&id=' + id, data: {messe: messe}
            })
          },
          deleteMesse: function (id) {
            return $http({
              method: 'DELETE', url: restURL + '?object=messe&id=' + id
            })
          },
          otone: function () {
            return $http({
              method: 'GET', url: restURL + '?object=oton'
            })
          },
          themen: function () {
            return $http({
              method: 'GET', url: restURL + '?object=thema'
            })
          }
        }
      }
    })
}())
