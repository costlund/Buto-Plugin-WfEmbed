# Buto-Plugin-WfEmbed
Embed file content.

## Embed
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

