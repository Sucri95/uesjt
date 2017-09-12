App.directive('checkbox', function($timeout) {
  return {
    require: '?ngModel',
    restrict: 'A',
    link: function($scope, element, attrs, ctrl)
    {
      element.bind('change', function()
      {
        var checked = element.prop('checked');
        
        $timeout(function()
        {
          ctrl.$setViewValue(checked);
          $scope.$apply();
        });
        
      });
    }
  }
});

App.directive('tree', function(){
  return {
    restrict: 'E',
    replace: true,
    scope: {
      collection: '=',
      search: '='
    },
    template: '<ul class="unstyled">'
            + '   <tree-item ng-repeat="item in collection | filter:search" item="item"></tree-item>'
            + '</ul>'
  }
});

App.directive('draggableTreeItem', function() {
  return {
    restrict:'A',
    link: function(scope, element, attrs) {
      element.draggable(
      {
        helper: function()
        {
          return element.clone()
            .width(element.width())
            .height(element.outerHeight())
            .css('lineHeight', element.height() + 'px');
        },
        appendTo: "body",
        forceHelperSize: true,
        forcePlaceholderSize: true,
        zIndex: 2,
        iframeFix: true
      });
    }
  };
});

App.directive('treeItem', function($compile){
  return {
    restrict: 'E',
    replace: true,
    scope: {
      item: '='
    },
    template: '<li>'
            + '   <span ng-show="item.value | isArray" class="label label-primary inline-block">//item.key//</span>'
            + '   <ul class="unstyled" ng-hide="item.value | isArray">'
            + '       <li ng-show="item.views" class="label label-inverse label-block">//item.key//</li>'
            + '       <li ng-repeat="view in item.views"><span class="label label-primary bcomponent" data-component="php.//view//" draggable-tree-item>//view//</span></li>'
            + '   </ul>'
            + '</li>',
    link: function(scope, element, attrs){
      if (angular.isArray(scope.item.value)){
        element.append('<tree collection="item.value"></tree>');
        $compile(element.contents())(scope);
      }

    }
  }
});