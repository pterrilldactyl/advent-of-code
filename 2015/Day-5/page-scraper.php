<?php
function scrapeBodyText($url, $session_cookie) 
{
    // Set a custom user agent to avoid blocks by some servers
    $context = stream_context_create([
        'http' => [
            'header' => implode("\r\n", [
                "User-Agent: Mozilla/5.0 (compatible; PHP scraper)",
                "Cookie: session=$session_cookie"
            ])
        ]
    ]);

    // Get the HTML content from the URL
    $html = @file_get_contents($url, false, $context);

    if ($html === false) {
        
        
        $error = error_get_last();
        return 'Error: ' . $error['message'];

        return 'Error fetching the URL. Check the URL or your internet connection.';
    }

    // Parse the HTML
    libxml_use_internal_errors(true);  // Suppress warnings for malformed HTML
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    libxml_clear_errors();

    // Extract the <body> text
    $body = $dom->getElementsByTagName('body')->item(0);

    if ($body) {
        return trim($body->textContent);
    } else {
        return 'No <body> tag found in the HTML.';
    }
}

// Example usage
$url = "https://adventofcode.com/2015/day/5/input";  // Replace with the URL you want to scrape
$session_cookie = "53616c7465645f5fb4f35fb75d87fab9b069101190037f54babd8d91694225203174fe0925eebccf38825d8900dad59b025c61d4f0b8f2835e4c52dc8d0106cf";
$bodyText = scrapeBodyText($url, $session_cookie);
echo $bodyText;


?>
