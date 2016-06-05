<?php

class LoginDAO{    
    public function authUser($login,$senha){
    
        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
        $stmt = $mysqli->prepare("SELECT cd_Usuario,nm_Usuario FROM Usuarios WHERE ds_Email=? AND ds_Senha=?");
        $stmt->bind_param("ss",$login,$senha);
        $stmt->execute();
        $stmt->bind_result($id,$nome);
        $stmt->fetch();
        $usu = array('id'=>$id,'nome'=>$nome);
        if($usu['id']>0){
            return $usu;
        }else{
            return false;
        }
    }
}