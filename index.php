<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE-edge>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  link

  <title>Scrapper</title>
</head>
<body>
  <h1>Scrapping Books names</h1>
    <?php   
    
      require 'vendor/autoload.php';
      $httpClient  = new \GuzzleHttp\Client();
      $url = 'https://books.toscrape.com/';
      $response = $httpClient->get($url);
      $htmlString = (string) $response->getBody();
      //print_r($htmlString);
      libxml_use_internal_errors(true);
/// DOM
      $doc = new DOMDocument();
      $doc -> loadHTML($htmlString);
      $xpath = new DOMXPath($doc);

      $names = $xpath->evaluate('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/h3/a');
      foreach ($names as $i){
        print_r($i->textContent.'<br>'); 
           }

?>

</body>
</html>