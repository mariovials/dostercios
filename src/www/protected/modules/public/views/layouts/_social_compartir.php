<?php $url = Yii::app()->request->hostInfo . Yii::app()->request->url; ?>
<div id="zona-social">
  <a class="twitter"
    href="http://twitter.com/intent/tweet?text=<?php echo $titulo ?>&url=<?php echo $url ?>"
    target="_blank"></a>
  <a class="facebook"
    href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>"
    target="_blank"></a>
  <a class="pinterest"
    href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url ?>" data-pin-do="buttonPin" data-pin-config="above"></a>
  <a class="google"
    href="https://plus.google.com/share?url=<?php echo $url ?>"
    target="_blank"></a>
  <a class="tumblr"
    href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url ?>"
    target="_blank"></a>
</div>
<script type="text/javascript">
  $(function() {
    $('#zona-social a').on('click', function(e) {
      a = $(this);
      console.debug('click!');
      href = a.attr('href');
      window.open(href, 'social-popup', 'width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
      e.preventDefault();
      return true;
    })
  });
</script>
