/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    
    // darken all the moviesthumbs;
    $(".moviethumb").fadeTo(0, 0.5);                                            // 0 speed in ms
    
    
    $(".moviethumb").hover(function(){                                          // enters
        $(this).fadeTo("slow", 1.0);                                            // brighten
    },
    function(){                                                                 // leaves
        $(this).fadeTo("slow", 0.5);                                            // darken
    });
});