<?php
/**
 * php sample/wordpress/tests.php
 */

function add_filter($function, $method, $options = null) {
    return null;
}

function site_url() {
    return 'https://msak-note.com';
}

$content_width = 600;

require_once __DIR__ . '/functions.php';

$img_tags = [
    "[before]<img src=\"https://msak-note.com/wp-content/uploads/2018/06/twitter_top0618.jpg\" />[after]",
    "[before]<img src=\"https://msak-note.com/wp-content/uploads/2018/06/twitter_top0618.jpg?v=1\" />[after]",
    "[before]<img src=\"https://msak-note.com/wp-content/uploads/2018/06/twitter_top0618.jpg?d=200\" />[after]",
    "[before]<img src=\"https://msak-note.com/wp-content/uploads/2018/06/twitter_top0618.jpg?v=1&d=200\" />[after]",
    "[before]<img src=\"https://msak-note.com/wp-content/uploads/2018/06/twitter_top0618-640x360.jpg?v=1\" srcset=\"https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?d=1000 1000w\" />[after]"
];

$expect = [
    "https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?&d=600",
    "https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?v=1&d=200 200w",
    "https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?d=400 400w",
    "https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?v=1&d=300 300w",
    "https://rabify.example.com/wp-content/uploads/2018/06/twitter_top0618.jpg?d=1000 1000w"
];

$comp = [];

for($i = 0; $i < count($img_tags); $i++) {
    $cdn = rabify_cdn( $img_tags[$i] );
    if(strpos($cdn,$expect[$i]) !== false){
        echo "[success] 配列${i}は期待通りに実行されました。 expect: ${expect[$i]}\n" ;
    } else {
        echo "[fail] 配列${i}は期待通りの値をとりませんでした。 expect: ${expect[$i]}\n" ;
    }
}
?>