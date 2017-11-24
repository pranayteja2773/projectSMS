</div><br><br>

<div class="text-center" id="footer">&copy; Copyright 2017-2018 Stationaty Management System</div>


<script>
    jQuery(window).scroll(function(){
        var vscroll = jQuery(this).scrollTop();
        jQuery('#logotext').css({
            "transform" : "translate(0px, "+vscroll/2+"px)"
        });
        var vscroll = jQuery(this).scrollTop();
        jQuery('#back-flower').css({
            "transform" : "translate("+vscroll/5+"px, -"+vscroll/12+"px)"
        });
        var vscroll = jQuery(this).scrollTop();
        jQuery('#fore-flower').css({
            "transform" : "translate(0px, -"+vscroll/2+"px)"
        });
    });
    
    function detailsmodal(id){
        var data = {"id" : id};
        jQuery.ajax({
            url : '/tutorials/includes/detailsmodal.php',
            method : "post",
            data : data,
            success: function(data){
                jQuery('body').append(data);
                jQuery('#myModal').modal('toggle');
            },
            error: function(){
                alert("something went wrong!");
            }
        });
    }
    </script>
    </body>
</html>