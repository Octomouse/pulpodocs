  <script type="text/javascript">
    var DEFAULT_WPM=250;
    var BASE_URL='<?=base_url()?>';
    var TTS_URL='<?=site_url("tts/getaudio/")?>';
  </script>
  
  <script type="text/javascript" src="<?=base_url()?>js/contentParser.js"></script>
  
  <div class="row">
    <div class="col-sm-12">
        <div id="spritzer" class="center-block">
        </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-12" style="float: none; margin: 0 auto;">
        <button type="Button" class="btn btn-primary" id="startbutton" onclick="javascript:updateSpritz();"><span class="glyphicon glyphicon-flash"></span> <span>Read it fast!</span></button>
        <button type="Button" class="btn btn-primary" id="mutebutton" data-toggle="button" onclick="javascript:toggleMute();"><span class="glyphicon glyphicon-volume-off"></span></button>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
    <h1><?=$title?></h1>
    </div>
  </div>



  <div class="row">
    <div class="col-sm-12 document-content">
        <?=$content?>
    </div>

  </div>
