<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<style type="text/css">
	<!--
body {
   background-image: url(clubvaio.jpg);
}
-->
</style>
</head>

<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$stockURL = "supachalasai.html";
	//$stockURL = "http://marketdata.set.or.th/mkt/stockquotation.do?symbol=PTT&language=th&country=TH";
	//$stockURL ="http://marketdata.set.or.th/mkt/stockquotation.do?symbol=BGH&language=th&country=TH";
	//$stockURL ="http://pantip.com/tag/iPhone_6_Plus";
	//$stockURL ="http://pantip.com/forum/supachalasai";
	//$stockURL="bgh.html";
	$html = file_get_contents($stockURL);
	//echo "$html";
	$dom = new DOMDocument('1.0', 'UTF-8');
	$dom->loadHTML($html);
	$xpathProcessor = new DOMXPath($dom);
	
	
		$xpathQueryString = "//div[@class='post-item-title']/a/text()";
		$title_results = $xpathProcessor->query($xpathQueryString);
		
		$xpathQueryStringLink = "//div[@class='post-item-title']/a/@href";
		$title_link_results = $xpathProcessor->query($xpathQueryStringLink);
		
		$xpathQueryString = "//span[@class='by-name']/text()";
		$title_results1 = $xpathProcessor->query($xpathQueryString);

		$xpathQueryString = "//span[@class='timestamp']/abbr/@data-utime";
		$title_results2 = $xpathProcessor->query($xpathQueryString);

		$xpathQueryString = "//div[@class='post-item-by']/div/@title";
		$title_results3 = $xpathProcessor->query($xpathQueryString);

		$xpathQueryString = "//div[@class='post-item-by']/div[2]/@title";
		$title_results4 = $xpathProcessor->query($xpathQueryString);
    
		$xpathQueryString = "//div[@class='post-item-footer']/div";
		$title_results5 = $xpathProcessor->query($xpathQueryString);

            //echo "<br> #ofResult_length =".$title_results->length."<br>";
    
		//$count=$title_results->length;
		for ($i=1 ;$i<=1;$i++ ){
            
			//$titlelength
			$titlelength = $title_results->item($i-1)->nodeValue;
			echo "<font color=\"993300\">กระทู้ที่ : $i<br>";
            
            //$title_results
            $title1 = $title_results->item($i-1)->nodeValue;
            echo "<font color=\"FF0000\">ชื่อกระทู้ = $title1<br>";
            
            //$title_link_results
			$link = $title_link_results->item($i)->nodeValue;
			echo "<font color=\"3366FF\">ลิงค์ = $link<br>";

            //$title_results1
			$post_by = $title_results1->item($i)->nodeValue;
			echo "<font color=\"9400D3\">ชื่อผู้โพส = $post_by<br>";
            
            //$title_results2
			$time_stamp = $title_results2->item($i)->nodeValue;
			echo "<font color=\"B22222\">เวลาที่โพส = $time_stamp<br>";
            
            //$title_results3
			$number_of_comments = $title_results3->item($i)->nodeValue;
			echo "<font color=\"0099CC\">จำนวนความคิดเห็น = $number_of_comments<br>";
            
            //$title_results4
			$number_of_likes = $title_results4->item($i)->nodeValue;
			echo "<font color=\"006400\">จำนวน Like = $number_of_likes<br>";
            
            //$title_results5
			$tags = $title_results5->item($i)->nodeValue;
			echo "<font color=\"CC6600\">Tag ข้อมูล = $tags<br>";
			

		echo "<font color=\"000000\">##-------------------------------------------------------------------------------------------------------------------------------------------------------------##<br>";
            //Check NodeType
            echo "<h2>---Check NodeType---</h2>";
            echo "<i>จำนวน NodeValue ของ >'$'title_results< = </i>".$title_results->item($i-1)->nodeValue; echo "<br>";
            echo "<i>จำนวน NodeType ของ >'$'title_results< = </i>".$title_results->item($i-1)->nodeType; echo "<br>";
            echo "<br>";
            echo "<################################################################################><br>";
		}
            
?>
</html>
