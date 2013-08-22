myAuth
======

generate_app_token.php
앱 토큰/시크릿 발급


generate_token.php
유저 토큰 발급

파라미터
  client_id : 앱 토큰
  client_secret : 앱 시크릿
  user_id : 유저 ID
  

delete_token.php
유저 토큰 폐기

파라미터
  token : 폐기할 토큰
  

is_valid_token.php
토큰 유효성 검사

파라미터
  token : 검사할 토큰
  client_id : 검사할 앱 토큰
  user_id : 검사할 유저 아이디
  

