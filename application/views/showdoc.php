  <script type="text/javascript">
    var DEFAULT_WPM=250;
    var BASE_URL='<?=base_url()?>';
    var TTS_URL='<?=site_url("tts/getaudio/")?>';
  </script>
  
  <script type="text/javascript" src="<?=base_url()?>js/contentParser.js"></script>
  
  <div class="row">
    <div class="col-sm-12">
        <input type="Button" id="startbutton" value="Read it fast!" onclick="javascript:updateSpritz();" />
        <div id="spritzer">
        </div>
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
