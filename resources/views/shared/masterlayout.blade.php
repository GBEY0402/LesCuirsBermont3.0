<!DOCTYPE html>
<html>
    <head>
        <title>Les Cuirs Bermont</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}" >
        <link rel="stylesheet" href="{!! asset('css/bootstrap-theme.min.css') !!}">
        <script src="{!! asset('js/jquery-2.1.4.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.colorbox.js') !!}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <link rel="stylesheet" href="{!! asset('css/sousmenu.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/colorbox.css') !!}">
        <script>
            $(document).ready(function(){
                //Examples of how to assign the Colorbox event to elements
                $(".group1").colorbox({rel:'group1'});
                $(".group2").colorbox({rel:'group2', transition:"fade"});
                $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
                $(".group4").colorbox({rel:'group4', slideshow:true});
                $(".ajax").colorbox();
                $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
                $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
                $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                $(".inline").colorbox({inline:true, width:"50%"});
                $(".callbacks").colorbox({
                    onOpen:function(){ alert('onOpen: colorbox is about to open'); },
                    onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
                    onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
                    onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
                    onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
                });

                $('.non-retina').colorbox({rel:'group5', transition:'none'})
                $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
                
                //Example of preserving a JavaScript event for inline calls.
                $("#click").click(function(){ 
                    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                    return false;
                });
            });
        </script>
      
    </head>
    <body>
        @include('shared.navbar')
        @yield('content')
        @if ($role == 'Administrateur')
            @yield('content-admin')
        @endif
        @if ($role == 'Administrateur' or $role == 'DirProd')
            @yield('content-admin-prod')
        @endif
        @if ($role == 'dirProd')
            @yield('content-prod')
        @endif
        @if ($role == 'employe')
            @yield('content-emp') 
        @endif
        <!--@include('shared.sous-menu') //sous menu potentiel--> 

    </body>
</html>
