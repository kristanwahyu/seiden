<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/klorofil-common.js') }}"></script>

{{-- SWEETALERT JS --}}
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
 
<script>
$(function(){
    var param = window.location.href.split("/");
    var param2 = param[0]+"//"+param[1]+param[2]+"/"+param[3];
    /*sidebar fix collapse*/
    $('.sb-nav-child').click(function(){
        if($(this).hasClass('sb-has-child')){
            $(this).siblings('li').find('.active').trigger('click');
        }
    });

    /*active sidebar when same url*/
    $(".nav a").each(function() {
        if (this.href == param2) {
            var parent = $(this).parents('.sb-has-child');
            if(parent.length > 0){
                parent.find('.collapsed').trigger('click');
            }
            $(this).addClass("active-sb-child");
        }
    });
});
</script>
