//I hate javascript. Keep that in mind while you read this ugly code.

var contentParser = { 
    nextText: null, 
    nextSpritzText: null, 
    nextAudio: null,
    content: null,
    contentIterator: null,
    wpm: DEFAULT_WPM,
    spritzController: null,
    
    //Status flags (yuck!)
    mute: false,
    isPlaying: false,
    isSpritzing: false,
    isSpritzReady: false,
    isAudioReady: false,
    
    init: function(){
        console.log("initializing contentParser");
        var rawContent=$(".document-content").text();
        this.content=rawContent.split(/[\n\.]+/);
        this.contentIterator=Iterator(this.content);
        this.prepareNextPhrase();
    },
    
    prepareNextPhrase: function (){
        do {
            this.nextText=this.contentIterator.next()[1].trim();
        } while(this.nextText==='');
        
        this.reloadCurrentPhrase();
    },
    
    reloadCurrentPhrase: function(){
        this.isSpritzReady=false;
        this.isAudioReady=false;
        SpritzClient.spritzify(this.nextText, 'en_GB', this.onSpritzifySuccess, this.onSpritzifyError);
        this.prerareNextAudio(this.nextText);
    },
    
    prerareNextAudio: function(text){
        var playurl=TTS_URL + '?wpm=' + encodeURIComponent(this.wpm) + '&text=' + encodeURIComponent(text);
        console.log("Downloading nextAudio from " +playurl);
        
        this.nextAudio = new Audio(playurl);
        this.nextAudio.addEventListener('loadedmetadata', 
        function (event) {
            console.log("nextAudio is ready, checking to play.");
            contentParser.isAudioReady=true;
            contentParser.checkPlay();
        }, false);
        
        this.nextAudio.addEventListener('ended', 
        function (event) {
            console.log("audio playback ended, checking to play.");
            contentParser.isPlaying=false;
            contentParser.checkPlay();
        }, false);
        
        this.nextAudio.addEventListener('error', 
        function (event) {
            console.log("audio playback error, skipping playback.");
            contentParser.isPlaying=false;
            contentParser.checkPlay();
        }, false);
    },
    
    checkPlay: function(){
      if(this.isSpritzReady && this.isAudioReady && !this.isPlaying && !this.isSpritzing){
          console.log("[CheckPlay] All set! playing...");
          this.play();
          this.prepareNextPhrase();
      } else {
          console.log("[CheckPlay] Cannot play right now.");
      }
    },
    
    play: function(){
      console.log("[Play] playing.");
      if(!this.mute){
          this.isPlaying=true;
          this.nextAudio.play();
      }
      
      this.isSpritzing=true;
      this.spritzController.startSpritzing(this.nextSpritzText);
    },
    
    onSpritzifySuccess: function(spritzText) {
        console.log("[Spritzify] Success... checking play...");
        contentParser.nextSpritzText = spritzText;
        contentParser.isSpritzReady = true;
        contentParser.checkPlay();
    },
    
    onSpritzifyError: function(error) {
        console.log("[Spritzify] Error :S ..." + error.message);
    },
    
    spritzDone: function(){
        console.log("[spritzDone] Done spritzing, checking play...");
        this.isSpritzing=false;
        this.checkPlay();
    }
  
};

var customOptions = {
    debugLevel:         0,                                          // Set debug level to 3 for verbose output
//  redicleWidth: 	    500,									   // Specify redicle width
//  redicleHeight:      100,									  // Specify redicle height
    defaultSpeed: 	    DEFAULT_WPM, 						     // Specify default speed
    speedItems: 	    [200, 250, 300, 350, 400, 450], 		// Specify speed options
    controlButtons:     [],								       // Specify a single control button
    placeholderText: {
        startText: '',                                       // Specify start text
        endText: ''                                         // Specify end text
                                                           // A LONG TIME AGO IN A GALAXY FAR FAR AWAY
    },
    redicle: {
        countdownTime: 100,                 // milliseconds
        countdownSlice: 1                  // milliseconds
    }
};

function updateSpritz() {
    var container=$("#spritzer");
    container.html('');
    contentParser.spritzController = new SPRITZ.spritzinc.SpritzerController(customOptions);
    contentParser.spritzController.attach(container);
    container.on("onSpritzComplete", function(event){contentParser.spritzDone();});
    container.on("onSpritzSpeedChange", function(event, speed) {
        contentParser.wpm=speed;
        contentParser.reloadCurrentPhrase();
    });
    contentParser.init();
}

function toggleMute(){
    contentParser.mute=!contentParser.mute;
}

$(function(){
    var container=$("#spritzer");
    container.html('');
    contentParser.spritzController = new SPRITZ.spritzinc.SpritzerController(customOptions);
    contentParser.spritzController.attach(container);
});