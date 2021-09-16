<?php

    function site(string $param = null): string
    {
        if($param && !empty(SITE[$param])){
            return SITE[$param];
        }

        return SITE["root"];
    }

    function views(string $path): string
    {
        return SITE['viewpath'].$path.".php";
    }

    function route(string $path = null): string
    {
        return site().$path;
    }

    function asset(string $path): string
    {
        return SITE['root']."/views/assets/{$path}";
    }

    function flash(string $type = null, string $message = null): ?string
    {
        if($type && $message){
            $_SESSION["flash"] = [
                "type"=> $type,
                "message"=> $message
            ];
            
            return null;
        }

        if(!empty($_SESSION["flash"])){
            
            echo "<script>const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: '".$_SESSION['flash']['type']."',
                title: '".$_SESSION['flash']['message']."'
              })</script>";

            unset($_SESSION['flash']);
        }

        return null;
    }

    function redirect($url = null)
    {
   
        echo "<script> window.location.href = '".site().$url."' </script>";

    }