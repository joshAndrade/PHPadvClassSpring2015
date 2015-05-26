 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers',
  'appServices',
  'appFilters'
]);

myApp.constant('config', {
    "endpoints": {
       "emails" : 'http://localhost/PHPAdvancedClassSpring2015/week5/Lab5v2/api/v1/emails/',
       "emailtypes" : 'http://localhost/PHPAdvancedClassSpring2015/week5/Lab5v2/api/v1/emailtypes/'
    },
    "models" : {
        "emailtype" : {
            "emailtype" : '',
            "active" : ''
        },
        "email" : {
            "email" : '',
            "emailtypeid" : '',
            "active" : ''
        }   
    }
            
});


myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/emailtypes.html',
            controller: 'emailTypesCtrl'
        }).
        when('/emails', {
            templateUrl: 'partials/emails.html',
            controller: 'emailCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);
  
  
  myApp.config(['$httpProvider',
  function($httpProvider) {
    // Use x-www-form-urlencoded Content-Type
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    
    $httpProvider.defaults.transformRequest = function(data){
        if (data === undefined) {
            return data;
        }
        var str = [];
        for(var key in data) {
          if (data.hasOwnProperty(key)) {
            var val = data[key];
            str.push(encodeURIComponent(key) + "=" + encodeURIComponent(val));
          }
        }
        return str.join("&");
    };
    
}]);