<?php
    header('Content-type: image/svg+xml');
    $color = "#".$_REQUEST["color"];

    if (!isset($color))
    {
        $color="#ffffff";
    }
?>

<svg
   width="256"
   height="256"
   viewBox="0 0 67.733332 67.733335"
   version="1.1"
   id="svg5"
   inkscape:export-filename="C:\Users\woute.FIRST\source\repos\Q.TS\public\img\icon\vendor\fortinet_small_white_16x16.png"
   inkscape:export-xdpi="6"
   inkscape:export-ydpi="6"
   inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)"
   sodipodi:docname="Fortinet-small-white.svg"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <sodipodi:namedview
     id="namedview7"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageshadow="2"
     inkscape:pageopacity="0.0"
     inkscape:pagecheckerboard="0"
     inkscape:document-units="mm"
     showgrid="false"
     units="px"
     inkscape:zoom="2"
     inkscape:cx="60.75"
     inkscape:cy="106.75"
     inkscape:window-width="3440"
     inkscape:window-height="1369"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="layer1" />
  <defs
     id="defs2" />
  <g
     inkscape:label="Layer 1"
     inkscape:groupmode="layer"
     id="layer1">
    <g
       id="g8"
       style="fill:<?=$color?>"
       transform="matrix(0.27292323,0,0,0.27292323,9.1932676,16.91927)">
      <path
         class="st0"
         d="m 0,47.1 h 50.3 v 33 H 0 Z M 64.2,0.2 h 49.4 v 33 H 64.2 Z m 0,93.6 h 49.4 v 33 H 64.2 Z m 63.2,-46.7 h 50.5 v 33 H 127.4 Z M 20.7,0.2 C 10.2,2.9 2,14.6 0,29.6 v 3.7 H 50.3 V 0.2 Z M 0,93.8 v 4.1 c 1.8,14.3 9.5,25.7 19.4,28.9 h 31 v -33 H 0 Z M 177.8,33.2 V 29.5 C 175.8,14.7 167.6,2.9 157.1,0.1 h -29.8 v 33 h 50.5 z M 158.4,127 c 9.8,-3.4 17.5,-14.6 19.4,-28.9 V 94 h -50.5 v 33 z"
         id="path6"
         style="fill:<?=$color?>" />
    </g>
  </g>
</svg>
