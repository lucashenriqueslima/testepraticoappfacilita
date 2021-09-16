<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="<?=asset("css/home.css")?>" rel="stylesheet">
  <link href="<?=asset("css/load.css")?>" rel="stylesheet">
  <link href="<?=asset("css/modal.css")?>" rel="stylesheet">

  <script src="https://unpkg.com/vue"></script>
  <script type="text/x-template" id="modal-template">
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">                 
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">                 
                </slot>
              </div>

              <div class="modal-body-2">
                <slot name="body-2">                 
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">                  
                </slot>
            <div class="box">
                <button class="modal-default-button" @click="$emit('close')">
                    OK
                </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>

</head>

<body>
  <div id="loader" class="ajax_load">
    <div class="ajax_load_box">
      <div class="ajax_load_box_circle"></div>
      <div class="ajax_load_box_title">Aguarde, carrengando...</div>
    </div>
  </div>
  <div id="main">
    <div class="sections-menu">

      <?php include_once($content); ?>

    </div>
  </div>

  <script src="<?= asset("/js/jquery.js"); ?>"></script>
  <script src="<?= asset("/js/main.js");?>"></script>
  <script src="<?= asset("/js/loader.js");?>"></script>
</body>

</html>