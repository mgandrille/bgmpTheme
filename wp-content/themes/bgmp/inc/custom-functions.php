<?php

/**
 * Make a slider using the url of all pictures
 * write an array for having an other picture when you click on the picture's slider
 * (First url in the array correspond to the picture of the slider, the seccond correspond to the "big picture")
 *
 * @param  array $images
 *
 */
function writeGallery($images)
{
    $html = '<div class="slider">';

    foreach($images as $k => $img)
    {
        if(is_string($img)) {
            $html .=  '<div class="carousel-image" title="" data-fancybox="" href="'.$img.'" style="background-image: url('.$img.'); "></div>';
        }
        else if (is_array($img)) {
            $html .=  '<div class="carousel-image" title="" data-fancybox="" href="'.$img[1].'" style="background-image: url('.$img[0].'); "></div>';
        }
    }

    $html .= '</div>';

    echo($html);
}