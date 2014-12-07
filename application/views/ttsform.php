  <script type="text/javascript">
    var nextAudio;
    function doPlay(playurl){
        var audio = new Audio(playurl);
        audio.addEventListener('loadedmetadata', 
        function (event) {
            nextAudio = new Audio(playurl);
            audio.play()
        }, false);

        audio.addEventListener('ended', 
        function (event) {
            nextAudio.play();
        }, false);
        
        //audio.play();
    }
    
    function play(){
        var url='<?=site_url("tts/getaudio/")?>' + '?' + $( "form" ).serialize();
        doPlay(url);
    }
    
    $( "form" ).submit(function( event ) {
        event.preventDefault();
        doPlay( '<?=base_url("tts/getaudio/")?>' + $( this ).serialize() );
    });
    
  </script>
  
  <div class="row">
    <div class="col-sm-12">
    <h1>Pulpo docs - TTS Service test page</h1>
    
    <p>Please input your text document below:</p>
    </div>
  </div>
  
  <form>
  <div class="row">
    <div class="col-sm-1">
        <spar>WPM:</span>
    </div>
    <div class="col-sm-11">
        <?=form_input('wpm','300')?>
    </div>
    <div class="col-sm-1">
        <spar>Text:</span>
    </div>
    <div class="col-sm-11">
        <?=form_textarea('text','Your text here')?>
    </div>
    <div class="col-sm-12">
        <input type="button" onclick="javascript:play()" value="Play" />
    </div>
  </div>
  </form>