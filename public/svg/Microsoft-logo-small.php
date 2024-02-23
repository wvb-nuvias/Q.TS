<?php
    header('Content-type: image/svg+xml');
    $color = "#".$_REQUEST["color"];

    if (!isset($color))
    {
        $color="#ffffff";
    }
?>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 23">
    <path fill="<?=$color?>" d="M1 1h10v10H1z"/>
    <path fill="<?=$color?>" d="M12 1h10v10H12z"/>
    <path fill="<?=$color?>" d="M1 12h10v10H1z"/>
    <path fill="<?=$color?>" d="M12 12h10v10H12z"/>
</svg>
