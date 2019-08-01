<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/defect_form_style.css">
</head>

<body>

  <div class="container">
      
    <div class="inner-addon left-addon">
      <i class="glyphicon glyphicon-user"></i>      
      <input type="text" class="form-control" placeholder="Username" />
    </div>

    <div class="inner-addon right-addon">
      <i class="glyphicon glyphicon-search"></i>
      <input type="text" class="form-control" placeholder="Search" />
    </div>
    
    <br>
    <br>
    
    <form class="webform-client-form webform-client-form-48" action="/estimation" method="post" id="webform-client-form-48" accept-charset="UTF-8">
        <div>
            <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">
                <label class="control-label" for="edit-submitted-codepostal">Code postal <span class="form-required" title="Ce champ est requis.">*</span></label>
                <div class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-user"></i>
                    <input placeholder="Code postal" class="form-control form-text" id="edit-submitted-codepostal" name="submitted[CodePostal]" value="" size="60" maxlength="5" autocomplete="off" type="text">
                </div>
            </div>
        </div>
    </form>
    
    <br>
    <br>
    
    <form class="webform-client-form webform-client-form-48" action="/estimation" method="post" id="webform-client-form-48" accept-charset="UTF-8">
        <div>
            <div class="input-group add-on col-lg-5 col-md-12 col-xs-12 col-sm-12">
                <label class="control-label" for="edit-submitted-codepostal">Code postal <span class="form-required" title="Ce champ est requis.">*</span></label>

                    <input placeholder="Code postal" class="form-control form-text" id="edit-submitted-codepostal" name="submitted[CodePostal]" value="" size="60" maxlength="5" autocomplete="off" type="text">
                    <div class="input-group-btn vertical-align-bottom">
                        <button class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i></button>
                    </div>

            </div>
        </div>
    </form>    
    <br>
    <br>
    
    <div class="col-md-12">
    	<div class="input-group add-on col-md-2 date datepicker" data-date-format="yyyy-mm-dd">
    		<input name="name" value="" class="form-control date-picker" data-date-format="yyyy-mm-dd" type="text">
          <div class="input-group-btn">
            <button class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i></button>
          </div>
   		</div>
    </div>

    <br>
    <br>

    <div class="row">

      <div class="form-group col-xs-6">
        <label class="control-label"><code>.inner-addon.<i>left</i>-addon</code></label>
        <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-user"></i>
          <input type="text" class="form-control" placeholder="Username" />
        </div>
      </div>

      <div class="form-group col-xs-6">
        <label class="control-label">
          <code>.inner-addon.<i>right</i>-addon</code>
        </label>
        <div class="inner-addon right-addon">
          <i class="glyphicon glyphicon-search"></i>
          <input type="text" class="form-control" placeholder="Search" />
        </div>
      </div>
    </div>

  </div>

  </div>
</body>

</html>