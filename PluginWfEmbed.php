<?php
/**
<p>
Embed content form file.
</p>
 */
class PluginWfEmbed{
  /**
  <p>
  Embed Javascript.
  </p>
  #code-yml#
  -
    type: widget
    data:
      plugin: 'wf/embed'
      method: js
      data:
        file: /plugin/xx/yy/js/function.js
  #code#
  */
  public static function widget_js($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $filename = wfArray::get($GLOBALS, 'sys/app_dir').wfSettings::replaceTheme($data->get('data/file'));
    if($data->get('data/file') && wfFilesystem::fileExist($filename)){
      $element = wfDocument::createHtmlElement('script', file_get_contents($filename));
    }else{
      $element = wfDocument::createHtmlElement('script', "alert('File $filename does not exist!');");
    }
    wfDocument::renderElement(array($element));
  }
  /**
  <p>
  Embed file.
  </p>
  #code-yml#
  -
    type: widget
    data:
      plugin: 'wf/embed'
      method: embed
      data:
        type: style
        file: /theme/xx/yy/css/style.css
  #code#
  */
  public static function widget_embed($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    if(!$data->get('data/type')){
      exit("PluginWfEmbed says: Param type is not set!");
    }
    if(!$data->get('data/file')){
      exit("PluginWfEmbed says: Param file is not set!");
    }
    $filename = wfArray::get($GLOBALS, 'sys/app_dir').wfSettings::replaceTheme($data->get('data/file'));
    if($data->get('data/file') && wfFilesystem::fileExist($filename)){
      $element = wfDocument::createHtmlElement($data->get('data/type'), file_get_contents($filename));
    }else{
      exit("PluginWfEmbed says: File $filename does not exist!");
    }
    wfDocument::renderElement(array($element));
  }
}






