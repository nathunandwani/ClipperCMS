<?php
/* Retrieve Clipper announcements from forum
 * using SimplePie
 * @link http://simplepie.org/ SimplePie
 * Requires PHP 5.2+
 */

/* Configuration
---------------------------------------------- */
// Urls to retrieve the RSS from (see Configuration > Interface & Features tab)

$urls['modx_news_content'] = $rss_url_news;
$urls['modx_security_notices_content'] = $rss_url_security;

// parameter setting number of items to fetch. For FluxBB = "show"
$numerator = 'show';

// default number to fetch
$itemsNumber = 5;

/* End of configuration
---------------------------------------------- */

require_once MODX_BASE_PATH . 'manager/media/rss/autoloader.php';

$feedData = array();

foreach ($urls as $section=>$url) {
	$output = '';
    $feed = new SimplePie();
    $feed->set_feed_url($url);
    $feed->set_cache_location(MODX_BASE_PATH . 'assets/cache/rss/');
//  SimplePie default values for cache:
//    $feed->enable_cache(true);
//    $feed->set_cache_duration(3600);

    if (!$feed->init()) {
        $output = 'Failed to retrieve ' . $url;
    } else {
        $feed->handle_content_type();
        $output .= '<ul>';

    // preserve config setting if feed URL includes number to show
        $showParam = '#' . $numerator . '=(\d+?)#';
        if ($show = preg_match($showParam, $url, $matches)) {
            $itemsNumber = intval($matches[1]);
        }

        if ($items = $feed->get_items(0, $itemsNumber)) {

            foreach($items as $item) {
                $link = $item->get_link();
                $title = $item->get_title();
                $pubdate = $item->get_date();
                $pubdate = $modx->toDateFormat(strtotime($pubdate));
                $description = strip_tags($item->get_description());

                if (strlen($description) > 199) {
                    $description = substr($description, 0, 200);
                    $description .= '...<br />Read <a href="' . $link . '" target="_blank">more</a>';
                }

                $output .= '<li><a href="' . $link . '" target="_blank">'
                . $title . '</a> - <b>' . $pubdate . '</b><br />'
                . $description . '</li>';
            }
        } else {
            $output .= '<li>(No relevant items are available)</li>';
        }
        $output .= '</ul>';
    }
	$feedData[$section] = $output;
}
?>