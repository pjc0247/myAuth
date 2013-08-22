<?
/*
	결과를 json 패킹하는 부분
*/

function RESULT($result, $message){
	return json_encode(array("status" => $result, "msg"  => $message));
}

?>