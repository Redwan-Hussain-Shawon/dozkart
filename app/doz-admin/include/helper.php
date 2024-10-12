
<?php
function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}

function generateSlug($string) {
    $slug = strtolower($string);
    
    $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
    $slug = preg_replace('/\s+/', '-', $slug);
    
    $slug = trim($slug, '-');
    return $slug;
}

?>