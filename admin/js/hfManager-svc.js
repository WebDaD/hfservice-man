/* global angular */
;(function () {
  angular.module('hfManager')
    .provider('hfManagerDataProvider', function hfManagerDataProvider () {
      var restURL = 'http://hfservice.webdad.eu/demo/api.php'
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
