# Buto-Plugin-WfEmbed
Embed file content.

## Embed one
Embed one file.
```
type: widget
data:
  plugin: 'wf/embed'
  method: embed
  data:
    type: script
    file: /plugin/xx/yy/js/PluginXxYy.js
```

## Multiple files
Embed multiple files.
```
type: widget
data:
  plugin: 'wf/embed'
  method: embed
  data:
    type: script
    file: 
      - /plugin/xx/yy/js/PluginXxYy1.js
      - /plugin/xx/yy/js/PluginXxYy2.js
```

## Widget example
Example of an widget.
```
public function widget_embed_script(){
  $file = '/plugin/_path_/_path_/js/file.js';
  $widget = wfDocument::createWidget('wf/embed', 'embed', array('type' => 'script', 'file' => $file));
  wfDocument::renderElement(array($widget));
}
```
