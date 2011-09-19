<?php 
$z = new XMLReader();
$z->open('names.xml');

$doc = new DOMDocument();

// move to the first <product /> node
while ($z->read() && $z->name !== 'name');

// now that we're at the right depth, hop to the next <product/> until the end of the tree
while ($z->name === 'name')
{
	echo $z->name."<br>";
	// either one should work
    //$node = new SimpleXMLElement($z->readOuterXML());
    $node = simplexml_import_dom($doc->importNode($z->expand(), true));

    // now you can use $node without going insane about parsing
    echo $node->fname." ".$node->lname."<br>";
    
    $z->next('name');
}

?>