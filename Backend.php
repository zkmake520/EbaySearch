
<?php
    //header("Access-Control-Allow-Origin: *");
    //header("Access-Control-Allow-Methods: GET , POST");
    function testInput($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }
//	$keyword =$page=$sort=$from=$sell=$to=$ship1=$ship2=$handletime="";
    $url = "";	
	$keyword = trim(empty($_GET['keyword'])?"":$_GET['keyword']);
	$keyword = stripslashes($keyword);
	$keyword = htmlentities($keyword);
	$to = empty($_GET['to'])?"":$_GET['to'];
	$from = empty($_GET['from'])?"":$_GET['from'];
	$page = empty($_GET['page'])?"":$_GET['page'];
	$sort = empty($_GET['sort'])?"":$_GET['sort'];
	$time = empty($_GET['handletime'])?"":$_GET['handletime'];
	$sell = empty($_GET['sell'])?"":$_GET['sell'];
	$ship1 = empty($_GET['ship1'])?"":$_GET['ship1'];
	$ship2 = empty($_GET['ship2'])?"":$_GET['ship2'];
	$curPage = empty($_GET['pageNumber'])?"":$_GET['pageNumber'];
    $filterCount = 0;
    $res = "";
	$url = "http://svcs.ebay.com/services/search/FindingService/v1?siteid=0&SECURITY-APPNAME=Universi-028f-44e5-9dbc-fc4e4aa72cb6&OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&RESPONSE-DATA-FORMAT=XML&keywords=".$keyword."&paginationInput.entriesPerPage=".$page."&sortOrder=".$sort."&outputSelector[1]=SellerInfo&outputSelector[2]=PictureURLSuperSize&outputSelector[3]=StoreInfo&paginationInput.pageNumber=".$curPage;
	if($from){
            $url .= "&itemFilter[$filterCount].name=MinPrice&itemFilter[$filterCount].value=".$from;
            $filterCount+=1;
    }
    if($to){
        $url .= "&itemFilter[$filterCount].name=MaxPrice&itemFilter[$filterCount].value=".$to;
        $filterCount+=1;
    }
    if(!empty($_GET['con'])){
        $count = 0;
        $url .= "&itemFilter[$filterCount].name=Condition";
        foreach($_GET['con'] as $condition){
            $url .="&itemFilter[$filterCount].value[$count]=$condition";
            $count +=1;
        }
        $filterCount +=1;
        
    }
    if(!empty($_GET['buy']))
    {
        $count = 0;
        $url .="&itemFilter[$filterCount].name=ListingType";
        foreach($_GET["buy"] as $listType){
            $url.= "&itemFilter[$filterCount].value[$count]=$listType";
            $count +=1;
        }
        $filterCount+=1;
    }

    if($sell){
        $url .="&itemFilter[$filterCount].name=ReturnsAcceptedOnly&itemFilter[$filterCount].value=true";
        $filterCount+=1;
    }
    if($ship1){
        $url .="&itemFilter[$filterCount].name=FreeShippingOnly&itemFilter[$filterCount].value=true";
        $filterCount+=1;
    }
    if($ship2){
        $url.="&itemFilter[$filterCount].name=ExpeditedShippingType&itemFilter[$filterCount].value=Expedited";
        $filterCount+=1;
    }
    if($time){
        $url .="&itemFilter[$filterCount].name=MaxHandlingTime&itemFilter[$filterCount].value=".$time;
        $filterCount+=1; 
    }
	$xml = simplexml_load_file($url);
	if($xml->paginationOutput->totalEntries!=0){
		//$res = '{"ack":"No results"}';
		$res = '{';
		$res .= '"ack":"'.$xml->ack.'",';
		$res .= '"resultCount":"'.$xml->paginationOutput->totalEntries.'",';
		$res .= '"pageNumber":"'.$xml->paginationOutput->pageNumber.'",';
		$res .= '"itemCount":"'.$xml->paginationOutput->entriesPerPage.'",';
		$count = 0;
		$totalCount =intval($xml->paginationOutput->totalEntries);
		$itemCount = intval($xml->paginationOutput->entriesPerPage);
		$base = intval($xml->paginationOutput->pageNumber)*$itemCount;
		$pageNumber = $xml->paginationOutput->pageNumber;
		$total = $itemCount;
		if($base > $totalCount)
			$total = $totalCount-($pageNumber-1)*$itemCount;
		foreach($xml->searchResult->item as $item){
			$res .= '"item'.$count.'":{"basicInfo":{"title":"'.htmlspecialchars($item->title).'","viewItemURL":"'.$item->viewItemURL.'","galleryURL":"'.$item->galleryURL.'","pictureURLSuperSize":"'.$item->pictureURLSuperSize.'",
				  "convertedCurrentPrice":"'.$item->sellingStatus->convertedCurrentPrice.'",
                  "shippingServiceCost":"'.$item->shippingInfo->shippingServiceCost.'",
                  "conditionDisplayName":"'.$item->condition->conditionDisplayName.'",
		          "listingType":"'.$item->listingInfo->listingType.'",
	              "location":"'.$item->location.'",
		          "categoryName":"'.$item->primaryCategory->categoryName.'",
		          "topRatedListing":"'.$item->topRatedListing.'"},';
		    $res .='"sellerInfo":{"sellerUserName":"'.$item->sellerInfo->sellerUserName.'","feedbackScore":"'.$item->sellerInfo->feedbackScore.'",
		    		"positiveFeedbackPercent" : "'.$item->sellerInfo->positiveFeedbackPercent.'",
                    "feedbackRatingStar" : "'.$item->sellerInfo->feedbackRatingStar.'",
                    "topRatedSeller":"'.$item->sellerInfo->topRatedSeller.'",
                    "sellerStoreName":"'.$item->storeInfo->storeName.'",
                    "sellerStoreURL":"'.$item->storeInfo->storeURL.'"},';
            if($count == $total-1){
	            $res .='"shippingInfo":{"shippingType":"'.$item->shippingInfo->shippingType.'","shipToLocations" : "'.$item->shippingInfo->shipToLocations.'",
	            	  "expeditedShipping" : "'.$item->shippingInfo->expeditedShipping.'",
	                  "oneDayShippingAvailable" : "'.$item->shippingInfo->oneDayShippingAvailable.'",
	                  "returnsAccepted" : "'.$item->returnsAccepted.'",
	                  "handlingTime" : "'.$item->shippingInfo->handlingTime.'"}}';
            }
            else{
            	$res .='"shippingInfo":{"shippingType":"'.$item->shippingInfo->shippingType.'","shipToLocations" : "'.$item->shippingInfo->shipToLocations.'",
	            	  "expeditedShipping" : "'.$item->shippingInfo->expeditedShipping.'",
	                  "oneDayShippingAvailable" : "'.$item->shippingInfo->oneDayShippingAvailable.'",
	                  "returnsAccepted" : "'.$item->returnsAccepted.'",
	                  "handlingTime" : "'.$item->shippingInfo->handlingTime.'"}},';
            }

            $count++;
		}
		$res .='}';
	}
	else{
		$res = '{"ack":"No results found"}';
	}
	echo $res;
?>