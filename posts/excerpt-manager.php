How to Custom excerpt length
Adding this PHP code to the functions.php file of your wordpress theme will allow you to set the length of your excerpt rather then the default 55 character limit.

function excerptLength($length) {
        return 100;
}
add_filter('excerpt_length', 'excerptLength');
