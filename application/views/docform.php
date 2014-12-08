  <?=form_open('document/create','role="form"')?>
  <div class="form-group">
    <label for="title">Document title:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Type your document title...">
  </div>

  <div class="form-group">
    <label for="title">Full text:</label>
    <textarea class="form-control" rows="4" id="document" name="document" placeholder="Type here your full document, you can use markdown to make it look pretier!"></textarea>
  </div>

  <div class="form-group">
    <label for="title">Summary text:</label>
    <textarea class="form-control" rows="4" id="summary" name="summary" placeholder="Type here a short summary of the important things about your legal document. This is optional. Delete this text and leave this field empty and use always the full version."></textarea>
  </div>

  <div class="row">
    <div class="col-sm-2">
        <label>Prerecorded audios:</label>
    </div>
    <div class="col-sm-10">
        <p>Full version will allow you to submit prerecorded audios to use instead of tts. No time to make it for the hackathon though.</p>
    </div>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  <?=form_close()?>