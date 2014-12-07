  <div class="row">
    <div class="col-sm-12">
    <h1>Pulpo docs</h1>
    
    Hello global hackathon!
    
    <p>Please input your text document below:</p>
    </div>
  </div>
  
  <?=form_open('document/create')?>
  <div class="row">
    <div class="col-sm-1">
        <spar>Document text:</span>
    </div>
    <div class="col-sm-11">
        <?=form_textarea('document','Your text here')?>
    </div>
    <div class="col-sm-12">
        <?=form_submit('submit','Submit')?>
    </div>
  </div>
  <?=form_close()?>