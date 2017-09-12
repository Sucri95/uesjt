var App = angular.module('App', ['ui.codemirror', 'ngAnimate']);
 
App.config(function($interpolateProvider) 
{
  $interpolateProvider.startSymbol('//');
  $interpolateProvider.endSymbol('//');
});