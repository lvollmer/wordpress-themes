<?php

class PulseConnectList {
    public $listID; //int
    public $listTitle; //string
    public $description; //string
    public $createTime; //dateTime
    public $creator; //string
    public $populated; //boolean
    public $seedListID; //int
    public $globalUnsub; //boolean
    public $publicSignup; //boolean
    public $blockDomains; //StringCollection
    public $countRecips; //boolean
    public $categoryID; //int
    public $externalID; //string
    public $friendlyFromName; //string
    public $friendlyTitle; //string
    public $custom1; //string
    public $channel; //string
    public $displayOrder; //int

}

class Recipient{
    public $recipID; // int
    public $address; // string
    public $externalID; // string
    public $carrier; // string
    public $protocol; // string
    public $status; // string
    public $comment; // string
    public $importID; // int
    public $password; // string
    public $signupMethod; // string
    public $signupIP; // string
    public $sourceSignupDate; // dateTime
    public $sourceDescription; // string
    public $thirdPartySource; // string
    public $thirdPartySignupDate; // dateTime
    public $dateLastClicked; // dateTime
    public $dateLastOpened; // dateTime
    public $clickCount; // int
    public $openCount; // int
    public $numBounces; // int
    public $blockCode; // string
    public $dateJoined; // dateTime
    public $dateBounce; // dateTime
    public $dateHeld; // dateTime
    public $dateUnsub; // dateTime
    public $dateOptout; // dateTime
    public $demographics; // StringCollection
}

class ListCollection {
   public  $List; // PulseConnectList
}

class sendMessageFromTemplate {
    public  $sendTemplateID; // int
    public  $customerReferenceNumber; // string
    public  $recipientEmail; // string
    public  $nameValuePairs; // StringCollection

}

class RecipientDataCollection {
    public  $RecipientData;
}

class RecipientData {
    public $address; // string
    public $externalID; // string
    public $nameValuePairs;// StringCollection
}

class StringCollection{
    public $xsd_string;
}

class Mailing {
    public  $title; // string
    public $externalID; // string
    public $comment; // string
    public $protocol; // string
    public $campaignID; // int
    public $brandID; // int
    public $listID; // int
    public $segmentID; // int
    public $segment; // TargetingSegment
    public $maxRecipients; // int
    public $seeds; // StringCollection
    public $blockDomains; // StringCollection
    public $purgeLists; // IntCollection
    public $purgeSuppressionLists; // IntCollection
    public $queueTime; // dateTime
    public $trackType; // string
    public $openTrackType; // string
    public $clickStreamType; // string
    public $advertiserName; // string
    public $unsubReportsAddress; // string
    public $unsubReportsSize; // int
    public $priority; // string
    public $additionalLists; // IntCollection
    public $socialNetworkIDs; // IntCollection

}

class TargetingSegment {
    public  $associativeString; // string
    public  $targetingConditionsCollection; // TargetingConditionCollection

}

class TargetingConditionCollection {
    public  $targetingConditions;// TargetingCondition
}

class TargetingCondition {
    public  $conditionColumn; // string
    public  $conditionOperator; // string
    public  $conditionValue;// string
}

class EmailContent {
    public $subject; // string
    public $fromEmail; // string
    public $fromName; // string
    public $toEmail; // string
    public $toName; // string
    public $replyToEmail; // string
    public $replyToName; // string
    public $charset; // string
    public $encoding; // string
    public $htmlContent; // string
    public $textContent; // string
    public $unsubContentID; // int
    public $replyContentID; // int
    public $headerContentID; // int
    public $footerContentID; // int
    public $forwardToFriendContentID; // int
}

class SocialContent {
    public $messageBody; // string
    public $imageURL; // string
    public $link; // string
    public $headline; // string
    public $caption; // string
    public $description; // string
    public $articleBody; // string

}

?>