<?php
	$rssadress = $_GET["url"];
	$rssmax = $_GET["limit"];

	$rssadress = $rssadress . "/rss";

    global $text, $maxchar, $end;
    $first_img = '';

    $rss = new DOMDocument();
    $rss->load($rssadress);
    $feed = array();
    foreach ($rss->getElementsByTagName('item') as $node) {
        $item = array (
            'title'=> $node->getElementsByTagName('title')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            'content' => $node->getElementsByTagName('encoded')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue
        );
        array_push($feed, $item);
    }

    $limit = $rssmax;
    for ($x=0; $x<$limit; $x++) {

        $title       = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        $link        = $feed[$x]['link'];
        $content     = $feed[$x]['desc'];
        $description = substr($description, 0, 100);
        $pubDate     = date('l F d, Y', strtotime($feed[$x]['date']));
        
        preg_match_all('/src=([\'"])?(.*?)\\1/', $content, $matches);
        $first_img   = $matches[0][0];

        echo '  <div class="post'.$x.'">
                    <a href=" '.$link.' " title=" '.$title.' ">
                        <img '.$first_img.'/>
                    </a>
                    <div class="detail'.$x.'">
                        <p>
                            <strong>
                                <a href=" '.$link.' " title=" '.$title.' ">'.$title.'</a>
                            </strong>
                        </p>
                    </div>
                </div>';
    }