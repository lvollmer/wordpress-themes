<?php
include_once "configuration.php";
include_once "entities.php";

class WebService extends SoapClient
{
    function __construct()
    {
        $ns = 'http://skylist.com/services/Soap';
        $username = new SoapHeader($ns, 'username', USERNAME);
        $password = new SoapHeader($ns, 'password', PASSWORD);
        $headers = array($username, $password);

        parent::__construct(SOAPURL);

        $this->__setSoapHeaders($headers);

    }

    /*
     * Most soap calls are returning an [Call_name]Response object.
     * Since we have not defined any class mapping for our SoapClient, this response simply
     * gets returned as a stdClass object with a single property named "return".
     *
     * Reference: http://www.lampjunkie.com/2010/03/get-phps-soapclient-to-speak-with-javas-jax-ws/
     */
    public function __call($method, $arguments)
    {
        $response = parent::__call($method, $arguments);

        return (isset ($response->return) ? $response->return : $response);

    }

    /* @getRecipientByAddress
     * parameters:
     * <xs:element name="address" type="xs:string" minOccurs="0" />
     * return:
     * <xs:element name="return" type="tns:Recipient" minOccurs="0" />
     * */
    function getRecipientByAddress($email)
    {
       
        $result =parent::getRecipientByAddress(array(
            "address" => $email
        ));
        return $result;
    }

    /* @getRecipientByExternalID
     * parameters:
     * <xs:element name="externalID" type="xs:string" minOccurs="0" />
     * return:
     * <xs:element name="return" type="tns:Recipient" minOccurs="0" />
     * */
    function getRecipientByExternalID($externalID)
    {
       
        $result =parent::getRecipientByExternalID(array(
            "externalID" => $externalID
        ));
        return $result;

    }


    /* @createRecipient
     * parameters:
     * <xs:element name="recipient" type="tns:Recipient" minOccurs="0" />
     * return:
     * <xs:element name="return" type="xs:int" />
     * */

    function createRecipient(Recipient $recipient)
    {
       
        $result =parent::createRecipient(array(
            "recipient" => $recipient
        ));
        return $result;

    }

    /* @getVersion
     * parameters: none
     * return:
     * <xs:element name="return" type="xs:string" minOccurs="0" />
     * */

    function getVersion()
    {
       
        $result =parent::getversion(array());
        return $result;
    }

    /* @SubscribeToList
     * parameters:
     * <xs:element name="listID" type="xs:int" />
     * <xs:element name="recipID" type="xs:int" />
     * <xs:element name="confirmed" type="xs:boolean" />
     * <xs:element name="sourceID" type="xs:string" minOccurs="0" />
     * <xs:element name="mailingID" type="xs:int" />
     * return:none
     */

    function SubscribeToList($listID, $recipientID, $confirmed, $sourceID, $mailingID)
    {
       
        $result =parent::SubscribeToList(array(
            "listID" => $listID,
            "recipID" => $recipientID,
            "confirmed" => $confirmed,
            "sourceID" => $sourceID,
            "mailingID" => $mailingID
        ));
        return $result;

    }

    /* @updateRecipient
     * Request
     * <xs:element name="recipient" type="tns:Recipient" minOccurs="0" />
     * return:none
     * */
    function updateRecipient($recipient)
    {
       
        $result =parent::updateRecipient(array(
            "recipient" => $recipient
        ));
        return $result;
    }

    /* @unSubscribeFromList
     * parameters:
     * <xs:element name="listID" type="xs:int" />
     * <xs:element name="recipID" type="xs:int" />
     * <xs:element name="mailingID" type="xs:int" />
     * return:none
     * */
    function unSubscribeFromList($listID, $recipientID, $mailingID)
    {
       
        $result =parent::unSubscribeFromList(array(
            "listID" => $listID,
            "recipID" => $recipientID,
            "mailingID" => $mailingID
        ));
        return $result;
    }

    /* @getList
     * parameters:
     * <xs:element name="searchValues" type="tns:List" minOccurs="0" />
     * return:
     * <xs:element name="return" type="tns:ListCollection" minOccurs="0" />
     * */
    function getLists(PulseConnectList $searchValues)
    {
       
        $result =parent::getLists(array(
            "searchValues" => $searchValues
        ));
        return $result;
    }

    /* @doImportFromTemplate
     * parameters:
     * <xs:element name="impTempID" type="xs:int" />
     * <xs:element name="data" type="xs:string" minOccurs="0" />\
     * return:
     * <xs:element name="return" type="xs:int" />
     * */

    function doImportFromTemplate($importTemplateID, $data)
    {
       
        $result =parent::doImportFromTemplate(array(
            "impTempID" => $importTemplateID,
            "data" => $data
        ));
        return $result;
    }

    /* @doImportAndSendFromTemplate
     * parameters:
     * <xs:element name="impTempID" type="xs:int" />
     * <xs:element name="sendTempID" type="xs:int" />
     * <xs:element name="data" type="xs:string" minOccurs="0" />
     * return:
     * <xs:element name="return" type="xs:int" />
     * */

    function doImportAndSendFromTemplate($impTempID, $sendTempID, $data)
    {
       
        $result =parent::doImportAndSendFromTemplate(array(
            "impTempID" => $impTempID,
            "sendTempID" => $sendTempID,
            "data" => $data
        ));
        return $result;
    }

    /* @sendMessageFromTemplate
     * parameters:
     * <xs:element name="sendTemplateID" type="xs:int" />
     * <xs:element name="customerReferenceNumber" type="xs:string" minOccurs="0" />
     * <xs:element name="recipientEmail" type="xs:string" minOccurs="0" />
     * <xs:element name="nameValuePairs" type="tns:StringCollection" minOccurs="0" />
     * return:
     * <xs:element name="return" type="xs:int" />
     * */

    function sendMessageFromTemplate($sendTemplateID, $customerReferenceNumber, $recipientEmail, $nameValuePairs)
    {
       
        $result =parent::sendMessageFromTemplate(array(
            "sendTemplateID" => $sendTemplateID,
            "customerReferenceNumber" => $customerReferenceNumber,
            "recipientEmail" => $recipientEmail,
            "nameValuePairs" => $nameValuePairs
        ));
        return $result;
    }

    /* @sendMessagesFromTemplate
     * parameters:
     * <xs:element name="sendTemplateID" type="xs:int" />
     * <xs:element name="recipientData" type="tns:RecipientDataCollection" minOccurs="0" />
     * return:
     * <xs:element name="return" type="xs:int" />
     **/
    function sendMessagesFromTemplate($sendTemplateID, $recipientData)
    {
       
        $result =parent::sendMessagesFromTemplate(array(
            "sendTemplateID" => $sendTemplateID,
            "recipientData" => $recipientData
        ));
        return $result;
    }

    /* @createEmailMailing
     * parameters:
     * <xs:element name="mailing" type="tns:Mailing" minOccurs="0" />
     * <xs:element name="content" type="tns:EmailContent" minOccurs="0" />
     * <xs:element name="socialContent" type="tns:SocialContent" minOccurs="0" />
     * return:
     * <xs:element name="return" type="xs:int" />
     * */

    function createEmailMailing($mailing, $content, $socialContent)
    {
       
        $result =parent::createEmailMailing(array(
            "mailing" => $mailing,
            "content" => $content,
            "socialContent" => $socialContent
        ));
        return $result;
    }

    /* @enableMailing
     * parameters:
     * <xs:element name="mailingID" type="xs:int" />
     * return:none
     * */

    function enableMailing($mailingID)
    {
       
        $result =parent::enableMailing(array(
            "mailingID" => $mailingID
        ));
        return $result;
    }

}