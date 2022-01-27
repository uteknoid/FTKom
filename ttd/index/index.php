<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Signature Pad demo</title>
  <meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <link rel="stylesheet" href="css/signature-pad.css">

  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/ie9.css">
  <![endif]-->

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body onselectstart="return false">

  <div id="signature-pad" class="signature-pad">
    <div class="signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Tanda Tangan Diatas</div>

      <div class="signature-pad--actions">
        <div>
          <button type="button" class="button clear" data-action="clear">Bersihkan</button>
          <button type="hidden" style="display: none;" class="button" data-action="change-color">Change color</button>
          <button type="hidden" style="display: none;" class="button" data-action="undo">Undo</button>

        </div>
        <div>
          <button type="button" class="button save" data-action="save-png">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/signature_pad.umd.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
