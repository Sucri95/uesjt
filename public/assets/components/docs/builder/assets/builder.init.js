CodeMirror.defineMode("mustache", function(config, parserConfig) {
  var mustacheOverlay = 
  {
    token: function(stream, state) 
    {
      var ch;
      if (stream.match("{{")) 
      {
        while ((ch = stream.next()) != null)
          if (ch == "}" && stream.next() == "}") break;

        stream.eat("}");
        return "mustache";
      }
      while (stream.next() != null && !stream.match("{{", false)) {}
      return null;
    }
  };
  return CodeMirror.overlayMode(CodeMirror.getMode(config, parserConfig.backdrop || "text/html"), mustacheOverlay);
});

var logger = function()
{
    var oldConsoleLog = null;
    var pub = {};

    pub.enableLogger = function enableLogger() 
    {
      if(oldConsoleLog == null)
          return;

      window['console']['log'] = oldConsoleLog;
    };

    pub.disableLogger = function disableLogger()
    {
      oldConsoleLog = console.log;
      window['console']['log'] = function() {};
    };

    return pub;
}();

/** added the fix **/
(function( $, undefined ) {
  $.ui.ddmanager.prepareOffsets =  function(t, event) {
    var i, j,
      m = $.ui.ddmanager.droppables[t.options.scope] || [],
      type = event ? event.type : null, // workaround for #2317
      list = (t.currentItem || t.element).find(":data(ui-droppable)").addBack();

      droppablesLoop: for (i = 0; i < m.length; i++) {

      //No disabled and non-accepted
      if(m[i].options.disabled || (t && !m[i].accept.call(m[i].element[0],(t.currentItem || t.element)))) {
        continue;
      }

      // Filter out elements in the current dragged item
      for (j=0; j < list.length; j++) {
        if(list[j] === m[i].element[0]) {
          m[i].proportions.height = 0;
          continue droppablesLoop;
        }
      }

      m[i].visible = m[i].element.css("display") !== "none";
      if(!m[i].visible) {
        continue;
      }

      //Activate the droppable if used directly from draggables
      if(type === "mousedown") {
        m[i]._activate.call(m[i], event);
      }

      m[i].offset = m[i].element.offset();

      // handle iframe scrolling
      m[i].offset.top -=  m[i].element.parents().find("html,body").scrollTop();
      m[i].offset.left -=  m[i].element.parents().find("html,body").scrollLeft();

      // check if droppable is inside iframe
      // TODO: nested iframes support.
      if (t.document[0] != m[i].document[0]) { 
        var frames = t.document[0].getElementsByTagName('iframe');
        for (var x = frames.length; x-- > 0;) {
          if (frames[x].contentWindow.document === m[i].document[0]) {
            var frame = $(frames[x]).offset();
            m[i].offset.left += frame.left;
            m[i].offset.top += frame.top;
          }
        }
      }

      m[i].proportions = { width: m[i].element[0].offsetWidth, height: m[i].element[0].offsetHeight };

    }
  };
})(jQuery);

function isGuid(id, prefix)
{
  if (typeof id == 'undefined')
    return false;

  if (!id.length)
    return false;

  // 47e8c425-8fda-d829-0e0b-1e89beb19935
  if (typeof prefix == 'undefined')
    var prefix = '';

  var regex = new RegExp(prefix + "([a-z0-9]+)-([a-z0-9]+)-([a-z0-9]+)-([a-z0-9]+)-([a-z0-9]+)", "ig");
  return id.match(regex);
}

function guid()
{
    var S4 = function() 
    {
       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    };
    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
}

function locationSearchObj()
{
  var search = location.search.substring(1);
  return search ? JSON.parse('{"' + search.replace(/&/g, '","').replace(/=/g,'":"') + '"}',
     function(key, value) { return key===""?value:decodeURIComponent(value) }) : {};
}

(function($, window)
{

  // logger.disableLogger();

  $(window).on('load', function()
  {
    var w = $(window).height(),
        n = $('.wnav').height(),
        h = w - n;

    $('.row-main > [class*="col"]').height(h);
  });

  $('#col-editor').disableSelection();

  $('#gallery-grid .row').draggable(
  {
    connectToSortable: ".demo-content",
    revert: "invalid",
    helper: "clone",
    cursor: "move",
    handle: ".bdrag-row",
    appendTo: "body",
    zIndex: 2
  });

  $(document).on("mousedown", ".CodeMirror .cm-mustache", function(event)
  {
    event.stopPropagation();
    event.preventDefault();

    var id = $.trim($(event.target).text()),
        id = id.replace(/(\{\{)/gm,""),
        id = id.replace(/(\}\})/gm,""),
        $frame = $('iframe')[0],
        $f = $frame.contentWindow.jQuery,
        t = $f('[data-component="' + id + '"]');

    if (t.length && !isExcluded(t))
      attachOverlay(t);
    else
      alert(id);
  });

  var layoutPreview = $('#layout-preview');
  var layoutSource = $('#layout-source');
  var menu = $('#gallery');
  var editor = $('#col-editor');

  window.toggleComponentsMenu = function()
  {
    var c = $(':checkbox[name="components"]');
    if (c.prop('checked'))
      c.parent().click();
  }

  $(':checkbox[name="components"]').change(function(){
    menu.toggle();

    if (typeof hideOverlay !== 'undefined')
      hideOverlay();
  });

  $(':radio[name="mode"]').change(function()
  {
    var mode = $(this).val();

    switch (mode)
    {
      default: break;
      case 'editor':
        layoutSource.hide();
        layoutPreview.show();
        break;

      case 'source':
        layoutPreview.add(menu).hide();
        layoutSource.height('100%').css('top', 0).show();
        break;
    }
  });

})(jQuery, window);