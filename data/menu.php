<?php
class menu{
	
function Highlight($id, $url=1,$color){
	if(isset($url)){
			if($id == $url){
				$customStyle = 'style="color:'.$color.';"';
			}	
		}
		return $customStyle;
		
	}
function link($linkType, $array_resource){
	switch ($linkType){
		case 'Link':
		$link = $array_resource['contents'];
		break;
		case '':
		break;
		case '':
		break;
		case '':
		break;
		default:
		//$link = "index.php?linkId=".$array_resource['id'];
		$link = $array_resource['urlname'].PAGE_EXTENSION;
		
		break;
		}
		return $link;
	}
	
function getLinkType($sql_array){
	return $sql_array['linkType'];
	
	}
function dropDown($sql_array,$l){
	global $groups, $conn,$l;
	$level1 = $groups -> getvisibleByParentId($sql_array['id']);

	
		if($this->getLinkType($sql_array) == 'Normal Group' && $conn->numRows($level1)>0){
			echo "<ul class='dropdown-menu'>";
			while($level2 = $conn -> fetchArray($level1)){
				
				if($this->getLinkType($level2)== 'Normal Group'){
					
					$class=  "<li class='dropdown-submenu'><a href = '".$this->link($level2['linkType'],$level2)."'>".$level2['name']."</a>";
				}
				else{
					$class =  "<li><a href = '".$this->link($level2['linkType'],$level2)."'>".$level2['name']."</a>";	
				}
			echo $class;
			
			if($this->getLinkType($level2)== 'Normal Group'){
				$this -> dropDown($level2,$l++);
				$l--;
			}
			
						
			echo "</li>";
			}
			echo "</ul>";
		}
	
	}
}
?>