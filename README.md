# Buto-Plugin-WfEmbed
Embed file content.


## Widget
```
type: widget
data:
  plugin: 'wf/embed'
  method: embed
  data:
```

### Type
```
    type: script
```

### One file
Embed one file.
```
    file: /plugin/xx/yy/js/PluginXxYy.js
```

### Multiple files
Embed multiple files.
```
    file: 
      - /plugin/xx/yy/js/PluginXxYy1.js
      - /plugin/xx/yy/js/PluginXxYy2.js
```

### Attribute
Add attribute to element.
```
    attribute:
      type: "text/babel"
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
