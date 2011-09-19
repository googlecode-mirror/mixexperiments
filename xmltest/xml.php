<?php
/**
 * @author: Rajan Rawal
 * @link: http://rajanrawal.wordpress.com
 * @uses: XMLReader
 * @version: 1.0
 * @desc:XML2Assoc Class to creating PHP Assoc Array from XML File
 * @license: GNU Public License 
 */

class Xml2Assoc {

	/**
	*
	* @var $bOptimize
	* Optimization Enabled / Disabled
	* if $bOptimize = false provides each node value as array i.e Optimization Disabled 
	* if $bOptimize = tuue provides each node value as array($key=>$value) Optimization Enabled
	*/
	protected $bOptimize = false;

	/**
	* Method for loading XML Data from String
	* @param string $sXml - XML String 
	* @param bool $bOptimize - Optimization Disabled / Enabled
	*/

	public function parseString( $sXml , $bOptimize = false) {
		
		$oXml = new XMLReader();
		$this -> bOptimize = (bool) $bOptimize;
		try {
			
			// Set String Containing XML data
			$oXml->XML($sXml);

            // Parse Xml and return result
			return $this->parseXml($oXml);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

    /**
     * Method for loading Xml Data from file
     *
     * @param string $sXmlFilePath - Path to .xml file
     * @param bool $bOptimize - Optimization Disabled / Enabled
     */
	public function parseFile( $sXmlFilePath , $bOptimize = false ) {
		$oXml = new XMLReader();
		$this -> bOptimize = (bool) $bOptimize;
		try {
            // Open XML file
			$oXml->open($sXmlFilePath);

            // Parse Xml and return result
			return $this->parseXml($oXml);

		} catch (Exception $e) {
			echo $e->getMessage(). ' | Try open file or File Path Error: '.$sXmlFilePath;
		}
	}

    /**
     * Method XML Parser
     *
     * @param XMLReader $oXml - Object of PHP XMLReader class
     * @return associative array
     */
	protected function parseXml( XMLReader $oXml ) {

		$aAssocXML = null;
		$iDc = -1;

		while($oXml->read()){
			switch ($oXml->nodeType) {

				case XMLReader::END_ELEMENT:

					if ($this->bOptimize) {
						$this->optXml($aAssocXML);
					}
					return $aAssocXML;

				case XMLReader::ELEMENT:

					if(!isset($aAssocXML[$oXml->name])) {
						
						if($oXml->hasAttributes) {
							$aAssocXML[$oXml->name][] = $oXml->isEmptyElement ? '' : $this->parseXML($oXml);
						} else {
							if($oXml->isEmptyElement) {
								$aAssocXML[$oXml->name] = '';
							} else {
								$aAssocXML[$oXml->name] = $this->parseXML($oXml);
							}
						}
					} elseif (is_array($aAssocXML[$oXml->name])) {
						
						if (!isset($aAssocXML[$oXml->name][0])){
							
							$temp = $aAssocXML[$oXml->name];
							foreach ($temp as $sKey=>$sValue){
                            	
								unset($aAssocXML[$oXml->name][$sKey]);
							}
							$aAssocXML[$oXml->name][] = $temp;
						}

						if($oXml->hasAttributes) {
							
							$aAssocXML[$oXml->name][] = $oXml->isEmptyElement ? '' : $this->parseXML($oXml);
                        } else {
                        	
							if($oXml->isEmptyElement) {
								
								$aAssocXML[$oXml->name][] = '';
							} else {
								
								$aAssocXML[$oXml->name][] = $this->parseXML($oXml);
							}
						}
					} else {
						
						$mOldVar = $aAssocXML[$oXml->name];
						$aAssocXML[$oXml->name] = array($mOldVar);
                        if($oXml->hasAttributes) {
                        	
							$aAssocXML[$oXml->name][] = $oXml->isEmptyElement ? '' : $this->parseXML($oXml);
						} else {
                        	
							if($oXml->isEmptyElement) {
                            	
								$aAssocXML[$oXml->name][] = '';
							} else {
								$aAssocXML[$oXml->name][] = $this->parseXML($oXml);
							}
						}
					}

					if($oXml->hasAttributes) {
						
						$mElement =& $aAssocXML[$oXml->name][count($aAssocXML[$oXml->name]) - 1];
						while($oXml->moveToNextAttribute()) {
							
							$mElement[$oXml->name] = $oXml->value;
						}
					}
					break;
				case XMLReader::TEXT:
				case XMLReader::CDATA:

					$aAssocXML[++$iDc] = $oXml->value;
			}
		}

		return $aAssocXML;
	}

    /**
     * Method to optimize assoc tree.
     * ( Deleting 0 index when element have one attribute / value )
     * 
     * @param array $mData, here $mData is used as passed by reference and return by reference 
     */
	public function optXml(&$mData) {
		
		if (is_array($mData)) {
			
			if (isset($mData[0]) && count($mData) == 1 ) {
				
				$mData = $mData[0];
				if (is_array($mData)) {
					
					foreach ($mData as &$aSub) {
                        $this->optXml($aSub);
                    }
                }
			} else {
            	
                foreach ($mData as &$aSub) {
                    $this->optXml($aSub);
				}
			}
		}
	}
}
?> 