 <a class="cssbuttongo" href='/wallet' style="display: none;">close</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
            var href = $('.cssbuttongo').attr('href');
                    window.location.href = href; //causes the browser to refresh and load the requested url
          });
</script>