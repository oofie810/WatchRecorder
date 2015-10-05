<?php
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(81);


$url = "http://forums.timezone.com/index.php?t=threadt&frm_id=71";
$page = file_get_contents($url);

$dom = new DOMDocument();
$dom->loadHTML($page);

$links = array();
foreach ($dom->getElementsByTagName('li') as $node) {
    // check here if li has class="tlist"
    //if it does, add it to the links array
    if (strpos($dom->saveHtml($node), 'class="tlist"')) {
        //var_dump($node->ownerDocument->saveXML($node));
        $a = $node->getElementsByTagName('a');
        //var_dump($a->item(0));
        //echo $a->item(0)->getAttribute('href') . ' :: ' .$a->item(0)->nodeValue.'<br />';
        $links[$a->item(0)->getAttribute('href')] = $a->item(0)->nodeValue;

    }
}
var_dump($links);


/**/

//most likely what will happen here:

$sites = [
    'timezone_sales_corner' => "http://forums.timezone.com/index.php?t=threadt&frm_id=71",
    'timezone_showcase' => "http://forums.timezone.com/index.php?t=threadt&frm_id=71",
    'watchuseek' => "http://forums.timezone.com/index.php?t=threadt&frm_id=71",
    'rolex_rolex' => "http://forums.timezone.com/index.php?t=threadt&frm_id=71",
    'rolex_non_rolex' => "http://forums.timezone.com/index.php?t=threadt&frm_id=71",
];

foreach ($sites as $site) {
    // load site to get links like lines 10-14
    // ? create a class for this?
    // ? pass url and name to parser class
    // parser class will determine what child class (specific forum parser) to use
    // parser class will then instantiate page parser class also
    // page parser class will be like parser class (parent, child) specific to forum
}