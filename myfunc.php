<?php

/**
 * XSSされないようにエスケープ処理を関数にする
 * htmlタグなどを入力されると攻撃されてしまうのでそれをさせない処理
 *
 * @param [type] $str
 * @return void
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
