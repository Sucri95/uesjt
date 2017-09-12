function AppCtrl($scope, $http, $timeout)
{
    $scope.codemirrorOptions = {
        lineWrapping : true,
        lineNumbers: true,
        // readOnly: 'nocursor',
        indentWithTabs: true,
        mode: 'mustache',
        extraKeys: {
          "Cmd-S": function (instance)
          {
             $scope.handleKeySave();
             return false;
          }
        },
        onLoad: function(_editor)
        {
          // Editor part
          var _doc = _editor.getDoc();
          _editor.focus();
        }
    };

    $scope.page = {};
    $scope.toggleCodeEditor = false;
    $scope.iframeLoaded = false;

    $scope.resetSearchValue = function(){
      $scope.search = '';
    };

    key('command+s,ctrl+s', function(e, handler)
    {
      e.preventDefault();
      $scope.handleKeySave();
    });

    $scope.handleKeySave = function()
    {
      if ($scope.saveComponent || $scope.savePage || $scope.fetchLoading)
        return;

      if ($scope.toggleCodeEditor)
        $scope.codeEditorSave();
    };

    $scope.makeTemplate = function(html, outer)
    {
      if (!html.length)
        return;

      if (typeof outer == 'undefined')
        var outer = false;

      html.find('[id*="overlay"]').remove();
      html.find('*')
        .removeClass('column')
        .removeClass (function (index, css) {
            return (css.match (/\bui-\S+/g) || []).join(' ');
        })
        .removeAttr('style');

      html.find('style, script').remove();
      html.contents().filter(function(){
        return this.nodeType == 8;
      })
      .remove();

      html.find('[id*="ui-id-"]').removeUniqueId();
      html.find('[data-component]').each(function(k,v)
      {
        var component = "{{" + $(v).attr('data-component') + "}}";

        $(v).after(component);
        $(v).remove();
      });

      html = outer ? html.prop('outerHTML') : html.html();
      html = html.replace(/(\r\n|\n|\r|\t)/gm,"");
      html = html.replace(/(\}\}\{\{)/gm,"}} {{");
      html = beautify(html);

      return html;
    };

    $scope.$watch('data', function(newValue, oldValue)
    {
      if (newValue !== oldValue && typeof newValue == 'object')
      {
        $scope.dataContent = newValue.contentHeader
                           + newValue.contentOverlay
                           + newValue.contentBody
                           + newValue.contentFooter;
      }
    });

    $scope.$watch('body', function(newValue, oldValue)
    {
      if (newValue !== oldValue)
        $scope.fetch();
    });

    $scope.getBody = function()
    {
      $scope.fetchLoading = true;
      var url = basePath + 'ajax/getPage.ajax',
          id = locationSearchObj().id;

      if (id)
      {
        url += '&id=' + id;
        $scope.page.id = id;
      }

      $http({
        method: 'POST', 
        url: url,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      })
      .success(function(data, status) 
      {
        $scope.fetchLoading = false;
        $scope.body = data;
      })
      .error(function(data, status) 
      {
        $scope.fetchLoading = false;
      });
    };

    $scope.saveComponentRequest = function(saveData)
    {
      $http({
        method: 'POST',
        url: basePath + 'ajax/saveComponent.ajax',
        data: $.param(saveData), 
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      })
      .success(function(data, status) 
      {
        $scope.saveComponent = false;
      })
      .error(function(data, status) 
      {
        $scope.saveComponent = false;
      });
    };

    $scope.savePageRequest = function(saveData)
    {
      $http({
        method: 'POST', 
        url: basePath + 'ajax/savePage.ajax',
        data: $.param(saveData), 
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      })
      .success(function(data, status) 
      {
        $scope.savePage = false;

        if (locationSearchObj().id !== saveData.id)
          return location = location.pathname + '?id=' + saveData.id;

        if (saveData.reload === true)
          location.reload();
      })
      .error(function(data, status) 
      {
        $scope.savePage = false;
      });
    };

    $scope.fetch = function() 
    {
      $scope.code = null;
      $scope.response = null;
      $scope.fetchLoading = true;
 
      $http({
        method: 'POST', 
        url: basePath + 'ajax/fetch.ajax',
        data: $.param({ 'body': $scope.body }), 
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      })
      .success(function(data, status)
      {
          $scope.status = status;
          $scope.data = data;
          $scope.fetchLoading = false;
      })
      .error(function(data, status)
      {
        $scope.data = data || "Request failed";
        $scope.status = status;
        $scope.fetchLoading = false;
      });
    };

    $scope.getBody();
}