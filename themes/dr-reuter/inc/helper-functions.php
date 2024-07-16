<?php

// Check variable output
function dd($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
};

// Check variable output
function vd($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
};

// Esc HTML, Translate, Echo
function customString(string $string) {
    if ($string) {
        echo esc_html__($string, 'dr-reuter');
    };
};

// Shorten long text and leave an elipsis
function truncateText($text, $length = 135, $ellipsis = '...') {
    if (strlen($text) <= $length) {
        return $text;
    } else {
        $truncated_text = substr($text, 0, $length);
        $last_space = strrpos($truncated_text, ' ');
        if ($last_space !== false) {
            $truncated_text = substr($truncated_text, 0, $last_space);
        }
        return $truncated_text . $ellipsis;
    }
}

// Wraps a string wrapped in || with a span
function wrapTextInSpan($inputString) {
    $pattern = '/\|([^|]+)\|/';
    $replacement = '<span>$1</span>';
    $outputString = preg_replace($pattern, $replacement, $inputString);

    return $outputString;
}
