<?
/*
	����� json ��ŷ�ϴ� �κ�
*/

function RESULT($result, $message){
	return json_encode(array("status" => $result, "msg"  => $message));
}

?>