<?php
class PluginWfEmbed{
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
  public static function widget_embed($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    /**
     * 
     */
    if(!$data->get('data/type')){
      exit("PluginWfEmbed says: Param type is not set!");
    }
    if(!$data->get('data/file')){
      exit("PluginWfEmbed says: Param file is not set!");
    }
    /**
     * 
     */
    $element = array();
    $files = array();
    if(!is_array($data->get('data/file'))){
      $files[] = $data->get('data/file');
    }else{
      $files = $data->get('data/file');
    }
    foreach ($files as $key => $value) {
      $value = wfSettings::replaceTheme($value);
      if($value && wfFilesystem::fileExist(wfGlobals::getAppDir().$value)){
        $element[] = wfDocument::createHtmlElement($data->get('data/type'), file_get_contents(wfGlobals::getAppDir().$value));
      }else{
        exit("PluginWfEmbed says: File $value does not exist!");
      }
    }
    wfDocument::renderElement($element);
  }
}
