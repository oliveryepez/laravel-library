<html>
<head>
    <title>Cyberfuel Library - @yield('title')</title>
    <link href="{{ asset("/assets/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/assets/fonts/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/assets/icons/ionic_icons.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/assets/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/iCheck/flat/blue.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/morris/morris.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}" rel="stylesheet" type="text/css"/>
</head>


    @yield('content')


<script src="{{ asset("/assets/jquery/jquery-2.2.1.js")  }}" type="text/javascript"></script>
<script src="{{ asset("http://code.jquery.com/ui/1.11.2/jquery-ui.min.js")  }}" type="text/javascript"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset("/assets/bootstrap/js/bootstrap.min.js")  }}" type="text/javascript"></script>
<script src="{{ asset("http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/morris/morris.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/sparkline/jquery.sparkline.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")  }}"></script>
<script src="{{ asset("/assets/plugins/knob/jquery.knob.js")  }}"></script>
<script src="{{ asset("/assets/plugins/daterangepicker/daterangepicker.js")  }}"></script>
<script src="{{ asset("/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/iCheck/icheck.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/slimScroll/jquery.slimscroll.min.js")  }}"></script>
<script src="{{ asset("/assets/plugins/fastclick/fastclick.min.js")  }}"></script>
<script src="{{ asset("/assets/dist/js/demo.js")  }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $menu_items = $('li.treeview');

        $($menu_items).each(function($item){
            $toggle_link = $($menu_items[$item]).find('a');

            $($toggle_link).click(function(){
                if($($menu_items[$item]).hasClass('active')){
                    $($menu_items[$item]).removeClass('active');
                }else{
                    $($menu_items[$item]).addClass('active');
                }
            });
        });
    });
</script>
</body>
</html>
