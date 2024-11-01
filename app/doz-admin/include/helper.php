
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

function shortenText($text, $maxLength) {
    if (strlen($text) > $maxLength) {
        return substr($text, 0, $maxLength - 3) . '...';
    }
    return $text;
}

function getOrderStatus($status) {
    // Define an associative array mapping status values to their descriptions
    $statuses = [
        1 => 'Processing',
        2 => 'Ready to Export',
        3 => 'Custom',
        4 => 'Warehouse',
        5 => 'Deliver',
        6 => 'Complete',
        7 => 'Order Cancel',
        8 => 'Order Check'
    ];

    return isset($statuses[$status]) ? $statuses[$status] : 'Unknown Status';
}


?>