<?php include_once 'utilities.php';?>
<h1>DYNAMIC UPDATE SYSTEM</h1>
<?php



ini_set('max_execution_time',60);
//Check For An Update
$getVersions = file_get_contents('http://sebicms.rajan.com/cms-update/version.txt') or die ('ERROR');
if ($getVersions != '')
{
	$updated = false;
	$local_veriosn = get_siteInfo();
	echo '<p>CURRENT VERSION: '.$local_veriosn.'</p>';
	echo '<p>Reading Current Releases List</p>';
	$versionList = explode("\n", $getVersions);
	
	foreach ($versionList as $aV){
		//if ( $aV > get_siteInfo()) {
		$advnce_version = trim($aV);
		$cmp = strcmp($advnce_version, $local_veriosn);
		
		if($cmp=='1'){
			echo '<p>New Update Found: v'.$advnce_version.'</p>';
			$found = true;
			
			//Download The File If We Do Not Have It
			//if ( !is_file(  $_ENV['site']['files']['includes-dir'].'/UPDATES/MMD-CMS-'.$advnce_version.'.zip' )) {
			if ( !is_file('temp/updates/application'.$advnce_version.'.zip' )) {
				echo '<p>Downloading New Update</p>';
				$newUpdate = file_get_contents('http://sebicms.rajan.com/cms-update/application'.$advnce_version.'.zip');
				//if ( !is_dir( $_ENV['site']['files']['includes-dir'].'/UPDATES/' ) ) mkdir ( $_ENV['site']['files']['includes-dir'].'/UPDATES/' );
				if ( !is_dir( 'temp/updates/' ) ) {
					mkdir ( 'temp/updates/' );
				}
				//$dlHandler = fopen($_ENV['site']['files']['includes-dir'].'/UPDATES/MMD-CMS-'.$advnce_version.'.zip', 'w');
				$dlHandler = fopen('temp/updates/application'.$advnce_version.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
				fclose($dlHandler);
				echo '<p>Update Downloaded And Saved</p>';
			} else echo '<p>Update already downloaded.</p>';	
			
			if (@$_GET['doUpdate'] == 'true') {
				//Open The File And Do Stuff
				$zipHandle = zip_open('temp/updates/application'.$advnce_version.'.zip');
				echo '<ul>';
				$i = 0;
				while ($aF = zip_read($zipHandle) ) 
				{
					$thisFileName = zip_entry_name($aF);
					$thisFileDir = dirname($thisFileName);
					
					//Continue if its not a file
					if ( substr($thisFileName,-1,1) == '/') continue;
					
					//Make the directory if we need to...
					echo $thisFileDir;
					if ( !is_dir ( '../zipphp/'.$thisFileDir ) )
					{
						echo "mkdir('../zipphp/'.$thisFileDir)";
						mkdir ('../zipphp/'.$thisFileDir );
						echo '<li>Created Directory '.$thisFileDir.'</li>';
					}
					//Overwrite the file
					if ( !is_dir('/'.$thisFileName) ) {
						echo '<li>'.$thisFileName.'...........';
						$contents = zip_entry_read($aF, zip_entry_filesize($aF));
						$contents = str_replace("\r\n", "\n", $contents);
						$updateThis = '';
						
						//If we need to run commands, then do it.
						if ( $thisFileName == 'upgrade.php' )
						{
							$upgradeExec = fopen ('upgrade.php','w');
							fwrite($upgradeExec, $contents);
							fclose($upgradeExec);
							include ('upgrade.php');
							unlink('upgrade.php');
							echo' EXECUTED</li>';
						}
						else
						{
							//echo $thisFileName;exit;
							$updateThis = fopen('../zipphp/'.$thisFileName, 'w');
							fwrite($updateThis, $contents);
							fclose($updateThis);
							unset($contents);
							echo' UPDATED</li>';
						}
					}
				}
				echo '</ul>';
				$updated = true;
			}
			else echo '<p>Update ready. <a href="?doUpdate=true">&raquo; Install Now?</a></p>';
			break;
		}
	}
	
	if ($updated == true)
	{
		set_setting($advnce_version);
		echo '<p class="success">&raquo; CMS Updated to v'.$advnce_version.'</p>';
	}
	else if ($found != true) echo '<p>&raquo; No update is available.</p>';

	
}
else echo '<p>Could not find latest realeases.</p>';