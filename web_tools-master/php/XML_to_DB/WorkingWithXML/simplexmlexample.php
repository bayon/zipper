<?php
$theData = simplexml_load_File("books.xml");

foreach($theData->Book as $theBook) {
    $theBookTitle = $theBook->Title;
    $theBookAuthor = $theBook->Author;
    $theBookPublisher = $theBook->PublishingInfo->PublisherName;
    $theBookPublisherCity = $theBook->PublishingInfo->PublisherCity;
    $theBookPublishedYear = $theBook->PublishingInfo->PublishedYear;

	echo "<p><span style=\"text-decoration:underline\">".$theBookTitle."</span>
	by ".$theBookAuthor."<br/>
	published by ".$theBookPublisher." (".$theBookPublisherCity.") in ".$theBookPublishedYear."</p>";

    unset($theBookTitle);
    unset($theBookAuthor);
    unset($theBookPublisher);
    unset($theBookPublishedYear);
}
?>