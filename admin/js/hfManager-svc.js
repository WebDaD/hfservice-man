/* global angular */
;(function () {
  angular.module('hfManager')
    .provider('hfManagerDataProvider', function hfManagerDataProvider () {
      var restURL = '/admin/api.php'
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
          addUser: function (user) {
            return $http({
              method: 'POST', url: restURL + '?object=user', data: user
            })
          },
          updateUser: function (id, user) {
            return $http({
              method: 'PUT', url: restURL + '?object=user&id=' + id, data: user
            })
          },
          deleteUser: function (id) {
            return $http({
              method: 'DELETE', url: restURL + '?object=user&id=' + id
            })
          },
          messen: function () {
            return $http({
              method: 'GET', url: restURL + '?object=messe'
            })
          },
          addMesse: function (messe) {
            return $http({
              method: 'POST', url: restURL + '?object=messe', data: messe
            })
          },
          updateMesse: function (id, messe) {
            return $http({
              method: 'PUT', url: restURL + '?object=messe&id=' + id, data: messe
            })
          },
          deleteMesse: function (id, force) {
            return $http({
              method: 'DELETE', url: restURL + '?object=messe&id=' + id + (force ? '&force' : '')
            })
          },
          changeMesseSort: function (id, reverseSort, messeUp) {
            return $http({
              method: 'PUT', url: restURL + '?object=messe&type=sort&id=' + id, data: { reverseSort: reverseSort, messeUp: messeUp }
            })
          },
          otone: function () {
            return $http({
              method: 'GET', url: restURL + '?object=oton'
            })
          },
          addOton: function (oton) {
            return $http({
              method: 'POST', url: restURL + '?object=oton', data: oton
            })
          },
          updateOton: function (id, oton) {
            return $http({
              method: 'PUT', url: restURL + '?object=oton&id=' + id, data: oton
            })
          },
          deleteOton: function (id) {
            return $http({
              method: 'DELETE', url: restURL + '?object=oton&id=' + id
            })
          },
          changeOtonSort: function (id, reverseSort, otonUp) {
            return $http({
              method: 'PUT', url: restURL + '?object=oton&type=sort&id=' + id, data: { reverseSort: reverseSort, otonUp: otonUp }
            })
          },
          themen: function () {
            return $http({
              method: 'GET', url: restURL + '?object=thema'
            })
          },
          addThema: function (thema) {
            return $http({
              method: 'POST', url: restURL + '?object=thema', data: thema
            })
          },
          updateThema: function (id, thema) {
            return $http({
              method: 'PUT', url: restURL + '?object=thema&id=' + id, data: thema
            })
          },
          deleteThema: function (id, force) {
            return $http({
              method: 'DELETE', url: restURL + '?object=thema&id=' + id + (force ? '&force' : '')
            })
          },
          changeThemaSort: function (id, reverseSort, themaUp) {
            return $http({
              method: 'PUT', url: restURL + '?object=thema&type=sort&id=' + id, data: { reverseSort: reverseSort, themaUp: themaUp }
            })
          }
        }
      }
    })
}())
