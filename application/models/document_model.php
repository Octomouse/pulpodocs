<?php

class document_model extends MY_Model {
    protected $primary_key = 'docid';
    
    var $docid;
    var $title;
    var $content;
    var $lastupdated;
}

