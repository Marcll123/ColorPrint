<?php
    class Validator{
        function validar_clave($clave,&$error_clave){
            if(strlen($clave) < 8){
               $error_clave = "La clave debe tener al menos 8 caracteres";
               return false;
            }
            if(strlen($clave) > 16){
               $error_clave = "La clave no puede tener más de 16 caracteres";
               return false;
            }
            if (!preg_match('`[a-z]`',$clave)){
               $error_clave = "La clave debe tener al menos una letra minúscula";
               return false;
            }
            if (!preg_match('`[A-Z]`',$clave)){
               $error_clave = "La clave debe tener al menos una letra mayúscula";
               return false;
            }
            if (!preg_match('`[0-9]`',$clave)){
               $error_clave = "La clave debe tener al menos un caracter numérico";
               return false;
            }
            if (!preg_match('`[!@#$%_]`',$clave)){
                $error_clave = "La clave debe tener al menos un caracter especiales";
                return false;
            }
            $error_clave = "";
            return true;
         }
    }
