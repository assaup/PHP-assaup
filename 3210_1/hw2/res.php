<?php
    $headers = get_headers('https://httpbin.org/post');
    echo "<textarea>";
        print_r($headers);
    echo "</textarea>";