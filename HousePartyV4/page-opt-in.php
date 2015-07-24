<?php
/*
Template Name: Opt In Confirmation
*/
get_header();
?>


  		<div id="container_full">
		    <?php
		    include (TEMPLATEPATH . '/WebService.php');

		    try {

			    $id = createRecipientWP();
			    SubscribeToListWP($id, 2278);

		    } catch (Exception $e) {
			    echo $e->getMessage();
		    }


		    function createRecipientWP()
		    {
			    $soap = new WebService();
			    $recipient = new Recipient();
			    $address = $_POST["email"];
			    $externalID = $_POST["email"];;
			    $sourceDescription = "WidgetAboveNav";
			    $recipient->address = $address;
			    $recipient->sourceDescription = $sourceDescription;
			    $recipient->externalID = $externalID;

			    $result = $soap->createRecipient($recipient);
			    echo "Recipient Created. RecipientID of created recipient is " . $result . "<br />";
			    return $result;

		    }
		    function SubscribeToListWP($id, $list)
		    {
			    $soap = new WebService();
			    $soap->SubscribeToList($list, $id, null, null, null);
			    echo "Subscribed recipient with recipientID" . $id . " to the list" . $list . "<br />";
		    }

		    ?>

  		</div>

  <?php get_footer(); ?>
