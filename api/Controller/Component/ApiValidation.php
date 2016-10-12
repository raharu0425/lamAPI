<?php
/**
 * ApiValidation Component
 * リクエストパラメータのバリデーションチェックコンポーネント
 */

class ApiValidation extends Component {

    /**
     * 文字数チェック
     * 4文字から16文字
     */
    public function isLengthRange($value, $min_len = 4, $max_len = 16)
    {
        $length = mb_strlen($value);
        if($length < $min_len || $length > $max_len) return false;

        return true;
    }

}

