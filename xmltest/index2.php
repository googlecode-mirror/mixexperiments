<?php
function xmlToAssoc($xml, $name)
{
    //print "<ul>";

    $tree = null;
    //print("I'm inside " . $name . "<br>");
   
    while($xml->read())
    {
        if($xml->nodeType == XMLReader::END_ELEMENT)
        {
            //print "</ul>";
            return $tree;
        }
       
        else if($xml->nodeType == XMLReader::ELEMENT)
        {
            $node = array();
           
            //print("Adding " . $xml->name ."<br>");
            $node['tag'] = $xml->name;

            if($xml->hasAttributes)
            {
                $attributes = array();
                while($xml->moveToNextAttribute())
                {
                   // print("Adding attr " . $xml->name ." = " . $xml->value . "<br>");
                    $attributes[$xml->name] = $xml->value;
                }
                $node['attr'] = $attributes;
            }
           
            if(!$xml->isEmptyElement)
            {
                $childs = xmlToAssoc($xml, $node['tag']);
                $node['childs'] = $childs;
            }
           
           // print($node['tag'] . " added <br>");
            $tree[] = $node;
        }
       
        else if($xml->nodeType == XMLReader::TEXT)
        {
            $node = array();
            $node['text'] = $xml->value;
            $tree[] = $node;
            //print "text added = " . $node['text'] . "<br>";
        }
    }
    //print "returning " . count($tree) . " childs<br>";
    //print "</ul>";
   
    return $tree;
}

/*
    Read XML structure to associative array
    --
    Using:
    $xml = new XMLReader();
    $xml->open([XML file]);
    $assoc = xml2assoc($xml);
    $xml->close();
*/
function xml2assoc($xml) {
      $assoc = null;
      while($xml->read()){
        switch ($xml->nodeType) {
          case XMLReader::END_ELEMENT: return $assoc;
          case XMLReader::ELEMENT:
            $assoc[$xml->name][] = array('value' => $xml->isEmptyElement ? '' : xml2assoc($xml));
            if($xml->hasAttributes){
              $el =& $assoc[$xml->name][count($assoc[$xml->name]) - 1];
              while($xml->moveToNextAttribute()) $el['attributes'][$xml->name] = $xml->value;
            }
            break;
          case XMLReader::TEXT:
          case XMLReader::CDATA: $assoc .= $xml->value;
        }
      }
      return $assoc;
    }
echo "<PRE>";

$xml = new XMLReader();
$xml->open('books.xml');
$assoc = xmlToAssoc($xml, "root");
//$assoc = xml2assoc($xml, "root");
$xml->close();

print_r($assoc);
echo "</PRE>";
?>