  <div class="row">
    <div class="col-sm-12">
    <h1>Pulpo docs</h1>
    
    Hello global hackathon!
    
    <p>Please input your text document below:</p>
    </div>
  </div>
  
  <?=form_open('document/create')?>
  <div class="row">
    <div class="col-sm-2">
        <spar>Document title:</span>
    </div>
    <div class="col-sm-10">
        <?=form_input('title','Type here your document title.')?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
        <spar>Document text:</span>
    </div>
    <div class="col-sm-10">
        <?=form_textarea('document','Type here your full document, you can use markdown to make it look pretier!')?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
        <spar>Summary text:</span>
    </div>
    <div class="col-sm-10">
        <?=form_textarea('summary','Type here a short summary of the important things about your legal document. This is optional. Delete this text and leave this field empty and use always the full version.')?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
        <spar>Prerecorded audios:</span>
    </div>
    <div class="col-sm-10">
        <p>Full version will allow you to submit prerecorded audios to use instead of tts. No time to make it for the hackathon though.</p>
    </div>
  </div>
  
  <div class="row">
      <div class="col-sm-12">
        <?=form_submit('submit','Submit')?>
      </div>
  </div>
  <?=form_close()?>