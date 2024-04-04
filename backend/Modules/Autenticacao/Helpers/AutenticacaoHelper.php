<?php

namespace Modules\Autenticacao\Helpers;

class AutenticacaoHelper
{
    static function formataSenha($senha, $usuario) :string
    {
        return strtoupper(md5(
            iconv(
                "UTF-8",
                "ISO-8859-1",
                mb_strtoupper($usuario, 'ISO-8859-1') . mb_strtoupper($senha)
            )
        ));
    }
}
