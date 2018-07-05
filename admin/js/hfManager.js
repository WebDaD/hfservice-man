/* global angular */
;(function () {
  angular.module('hfManager', ['ngRoute', 'ngCookies', 'ngAnimate', 'ui.bootstrap', 'angularFileUpload'])
    .config(['$routeProvider', function ($routeProvider) {
      $routeProvider
        .when('/messen', {
          controller: 'hfManager-Messen',
          controllerAs: 'ctrl',
          templateUrl: 'templates/messe/index.html'
        })
        .when('/themen', {
          controller: 'hfManager-Thema',
          controllerAs: 'ctrl',
          templateUrl: 'templates/thema/index.html'
        })
        .when('/themen/:messe', {
          controller: 'hfManager-Thema',
          controllerAs: 'ctrl',
          templateUrl: 'templates/thema/index.html'
        })
        .when('/otone', {
          controller: 'hfManager-Otone',
          controllerAs: 'ctrl',
          templateUrl: 'templates/oton/index.html'
        })
        .when('/otone/:messe', {
          controller: 'hfManager-Otone',
          controllerAs: 'ctrl',
          templateUrl: 'templates/oton/index.html'
        })
        .when('/otone/:messe/:thema', {
          controller: 'hfManager-Otone',
          controllerAs: 'ctrl',
          templateUrl: 'templates/oton/index.html'
        })
        .when('/user', {
          controller: 'hfManager-User',
          controllerAs: 'ctrl',
          templateUrl: 'templates/user/index.html'
        })
        .otherwise({ redirectTo: '/messen' })
    }])
    .run(['$cookies', '$rootScope', '$location', '$http', function ($cookies, $rootScope, $location, $http) {
      $rootScope.$on('$locationChangeStart', function (event, next, current) {
        if ($rootScope.id === '' || $rootScope.token === '') {
          window.location = '/admin/login.html'
        }
      })
      $rootScope.isActive = function (viewLocation) { // eslint-disable-line
        return viewLocation === $location.path()
      }
      if (typeof $cookies.get('hfManager-id') !== 'undefined' && typeof $cookies.get('hfManager-token') !== 'undefined') {
        $rootScope.id = $cookies.get('hfManager-id')
        $rootScope.token = $cookies.get('hfManager-token')
        $http.defaults.headers.common.id = $cookies.get('hfManager-id')
        $http.defaults.headers.common.token = $cookies.get('hfManager-token')
      } else {
        $rootScope.id = ''
        $rootScope.token = ''
        $http.defaults.headers.common.email = ''
        $http.defaults.headers.common.token = ''
        window.location = '/admin/login.html'
      }
      $rootScope.logout = function () { // eslint-disable-line
        $cookies.remove('hfManager-id')
        $cookies.remove('hfManager-token')
        $rootScope.id = ''
        $rootScope.token = ''
        $http.defaults.headers.common.email = ''
        $http.defaults.headers.common.token = ''
        $location.path('/admin/login.html')
      }
    }])
}())
