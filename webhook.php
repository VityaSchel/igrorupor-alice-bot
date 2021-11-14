<?php

$j = json_decode(file_get_contents("php://input") ,true);
$reqText = $j['request']['command'];
$respText = "";
//file_put_contents("log.html", time().": ".$reqText."<br>", FILE_APPEND);

$resp = '{
      "response": {
        "text": "Извините, этот навык временно не работает, потому что у автора сломалась база данных MySQL. Он врятли когда-то ее починит, но может напишет что-то об этом в своем инстаграме https://instagram.com/vityaschel",
        "buttons": [
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';

switch($reqText){
  case "Какие новости?":
  case "какие новости?":
  case "какие новости":
/*    $pkl = file_get_contents("https://rsshub.app/telegram/channel/igromania");
    $xml = simplexml_load_string($pkl, null, LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, true);
    $result = "Новости к этому часу от Игромании. \\n\\n";
    $resultTTS = "Новости к этому часу от Игромании. sil <[1000]>";
    for ($i=0; $i < 3; $i++) {
      //ob_start();
      $pp = $array['channel']['item'][$i]['description'];
      $pp = str_replace("<br>", " ", $pp);
      if(strpos($pp,"<img") !== false){
          $pp = explode("<img",$pp)[0];
      }
      $pp = preg_replace("/\n|\s{2,}/mi", " ", $pp);
      $pp = preg_replace("/(<a.*>(.*)<\/a>)/mi", "(ссылка: $2)", $pp);
      $pp = preg_replace("/(https{0,1}:\/\/([a-zA-Z%0-9_.]{1,}){1,}\/[a-zA-Z%0-9_\/]{1,}\.[a-zA-Z%0-9_\/]{1,})/mi", "URL", $pp);
      $pp = preg_replace("/\n|\s{2,}/mi", " ", $pp);
      $pp = str_replace('<b>', '', $pp);
      $pp = str_replace('</b>', '', $pp);
      $pp = str_replace('<i>', '', $pp);
      $pp = str_replace('</i>', '', $pp);
      $pp = str_replace('<u>', '', $pp);
      $pp = str_replace('</u>', '', $pp);
      $pp = str_replace('<p>', '', $pp);
      $pp = str_replace('</p>', '', $pp);
      $pp = str_replace('"', '', $pp);
      $pp = str_replace("'", '', $pp);
      $pp = mb_convert_encoding($pp, 'UTF-8', 'UTF-8');
      $alen = strlen($pp);
      // maxlen: 1024
      // len of 1: 1024/3=341
      // 341-.pp (341-29)=312
      // 312-\n\n (312-6)= 306
      // 306-sil1000 (306-12-39/3) = 281
      // maxlen of 1 el = 281
      $pp = mb_substr($pp, 0, 281);
      if($alen > 281){
        $pp .= "... новость слишком длинная. ";
      }
      $result .= $pp."\\n\\n";
      $resultTTS .= $pp."sil <[1000]>";
      //var_dump($array['channel']['item'][$i]['description']);
      //$result .= ob_get_clean();
      //['description'].";";
    }

    $resp = '{
      "response": {
        "text": "'.$result.'",
        "tts": "'.$resultTTS.'",
        "buttons": [
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';*/
    break;

  case "Загадай игру":
  case "загадай игру":
/*    $rg = json_decode(file_get_contents("randomgame"),true);
    $game = $rg['applist']['apps'][rand(0,94226)];

    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    $gname = preg_replace("/[^a-zA-ZА-Яа-я0-9 ]/mi", "", $game['name']);
    $gname = preg_replace("/( {2,})/mi", "", $gname);
    if ($result->num_rows > 0) {
      $sql = "UPDATE sessions SET state='ugad',info='".$gname."-;-".$game['appid']."' WHERE sessionID='".$j['session']['user_id']."'";
    } else {
      $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','ugad','".$gname."-;-".$game['appid']."')";
    }
    $result = $conn->query($sql);
    $conn->close();

    $resp = '{
      "response": {
        "text": "Хорошо, я загадала случайную видео-игру. В названии '.kek(count(explode(' ',$game['name']))).nameletters($gname).'. Попробуйте отгадать!",
        "buttons": [
            {
                "title": "Сдаюсь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';
*/
    break;

  case "Угадай игру":
  case "угадай игру":
/*    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $sql = "UPDATE sessions SET state='zagad',info='' WHERE sessionID='".$j['session']['user_id']."'";
    } else {
      $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','zagad','')";
    }
    $result = $conn->query($sql);
    $conn->close();

    $resp = '{
      "response": {
        "text": "Назовите несколько слов, описывающих загаданную вами видео-игру, а я попробую отгадать ее. Название использовать нельзя.",
        "buttons": [
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';
*/
    break;

  case "Что ты умеешь?":
  case "что ты умеешь?":
  case "что ты умеешь":
  case "Что ты умеешь":
  case "":
  $resp = '{
    "response": {
      "text": "Я могу рассказать вам последние новости про видео-игры — для этого, скажите «Какие новости?». Могу поиграть с вами в игру «Угадай игру», а еще вы можете попросить меня загадать игру. Хотите узнать новости на '.getToDate().' или поиграть в «Угадай игру»?",
      "buttons": [
          {
              "title": "Какие новости?",
              "hide": true
          },
          {
              "title": "Угадай игру",
              "hide": true
          },
          {
              "title": "Загадай игру",
              "hide": true
          },
          {
            "title": "Что ты умеешь?",
            "hide": true
          },
          {
            "title": "Помощь",
            "hide": true
          }
      ],
      "end_session": false
    },
    "version": "1.0"
  }';
    break;

  case "Помощь":
  case "помощь":
    $resp = '{
      "response": {
        "text": "Хотите узнать новости на '.getToDate().' или поиграть в «Угадай игру»?",
        "buttons": [
            {
                "title": "Какие новости?",
                "hide": true
            },
            {
                "title": "Угадай игру",
                "hide": true
            },
            {
                "title": "Загадай игру",
                "hide": true
            },
            {
              "title": "Что ты умеешь?",
              "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';

    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $sql = "UPDATE sessions SET state='',info='' WHERE sessionID='".$j['session']['user_id']."'";
    } else {
      $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','','')";
    }
    $result = $conn->query($sql);
    $conn->close();
    break;

  case "Сдаюсь":
  case "сдаюсь":
  case "я сдаюсь":
  case "я Сдаюсь":
    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state,info FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    $info = "";
    $infoID = "";
    $ok = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $info = explode("-;-",$row["info"])[0];
           $infoID = explode("-;-",$row["info"])[1];
           $ok = 1;
        }
    }
    $resp = '{
      "response": {
        "text": "Правильный ответ: '.$info.' Хотите узнать подробнее или сыграем еще раз?",
        "buttons": [
            {
                "title": "Загадай игру",
                "hide": true
            },
            {
                "title": "'.$info.' в Steam",
                "url": "https://store.steampowered.com/app/'.$infoID.'",
                "hide": true
            },
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';
    if ($ok == 1) {
      $sql = "UPDATE sessions SET state='' WHERE sessionID='".$j['session']['user_id']."'";
    } else {
      $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','','')";
    }
    $result = $conn->query($sql);
    $conn->close();
    break;

  case "Да":
  case "да":
  case "Дыа":
  case "дыа":
  case "Даб":
  case "даб":
  case "Ага":
  case "ага":
/*
    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state,info FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    $info = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $info = $row["info"];
           $state = $row['state'];
        }
    }
    if($state == "ugad"){
      $resp = '{
        "response": {
          "text": "Нет, да, нет. Я запуталась. Давайте не дразниться",
          "buttons": [
              {
                  "title": "Сдаться",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    } else if($state == "zagadano") {
      $resp = '{
        "response": {
          "text": "Отлично! Сыграем еще раз? Скажите Угадай игру",
          "buttons": [
              {
                  "title": "Угадай игру",
                  "hide": true
              },
              {
                  "title": "Помощь",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    } else {
      $resp = '{
        "response": {
          "text": "Я вас не совсем поняла. Скажите Помощь, чтобы я вернулась в начало",
          "buttons": [
              {
                  "title": "Помощь",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    }*/
    break;

  case "Нет":
  case "нет":
/*
    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state,info FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    $info = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $info = $row["info"];
           $state = $row['state'];
        }
    }
    $info = preg_replace("/ ,|, $/m", '', $info);
    if($state == "ugad"){
      $resp = '{
        "response": {
          "text": "Да, нет",
          "buttons": [
              {
                  "title": "Сдаюсь",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    } else if($state == "zagadano"){
      $resp = '{
        "response": {
          "text": "Что-ж, не угадала. Еще я думала, что вы загадали '.$info.'",
          "buttons": [
              {
                  "title": "Угадай игру",
                  "hide": true
              },
              {
                  "title": "Помощь",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    } else {
      $resp = '{
        "response": {
          "text": "Я вас не совсем поняла. Скажите Помощь, чтобы я вернулась в начало",
          "buttons": [
              {
                  "title": "Помощь",
                  "hide": true
              }
          ],
          "end_session": false
        },
        "version": "1.0"
      }';
    }
*/
    break;

  case "stigfinnare":
  case "Stigfinnare":
  case "стигфинаре":
  case "стигнифаер":
  case "стигнифаре":
  case "стигфиннаре":
  case "stigfinare":
    $resp = '{
      "response": {
        "text": "моя единственная любимая 💖",
        "buttons": [
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';
    break;

  case "roller-ride":
  case "Roller-ride":
  case "RollerRide":
  case "roller ride":
  case "роллер райд":
  case "ролер райд":
  case "роллер-райд":
    $resp = '{
      "response": {
        "text": "неповторимая 💖",
        "buttons": [
            {
                "title": "Помощь",
                "hide": true
            }
        ],
        "end_session": false
      },
      "version": "1.0"
    }';
    break;

  default:
/*
    $servername = "localhost";
    $username = "sqlaccess";
    $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
    $dbname = "alice";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT state,info FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
    $result = $conn->query($sql);
    $state = "";
    $info = "";
    $infoID = "";
    $ok = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $state = $row["state"];
           if($row["info"] != ""){
             $asdasd = explode("-;-",$row["info"]);
             if(count($asdasd) > 1){
               $info = $asdasd[0];
               $infoID = $asdasd[1];
             } else {
               $info = $asdasd[0];
               $infoID = "";
             }
           }
           $ok = 1;
        }
    }
    if($state == "ugad"){
      if($reqText == $info){
        $resp = '{
          "response": {
            "text": "Верно! Хотите сыграть еще раз - скажите Загадай игру или нажмите на кнопку, чтобы узнать подробнее об этой игре.",
            "buttons": [
                {
                    "title": "Загадай игру",
                    "hide": true
                },
                {
                    "title": "'.$info.' в Steam",
                    "url": "https://store.steampowered.com/app/'.$infoID.'",
                    "hide": true
                },
                {
                    "title": "Помощь",
                    "hide": true
                }
            ],
            "end_session": false
          },
          "version": "1.0"
        }';
        if ($ok == 1) {
          $sql = "UPDATE sessions SET state='' WHERE sessionID='".$j['session']['user_id']."'";
        } else {
          $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','','')";
        }
        $result = $conn->query($sql);
        $conn->close();
      } else {
        $resp = '{
          "response": {
            "text": "Нет",
            "buttons": [
                {
                    "title": "Сдаюсь",
                    "hide": true
                }
            ],
            "end_session": false
          },
          "version": "1.0"
        }';
      }
    } else {
      if($state == "zagad"){
        $html = file_get_contents("https://duckduckgo.com/html/?kl=ru-ru&q=".urlencode($reqText." -stride site:store.steampowered.com/app"));
        $html = explode('<a rel="nofollow" class="result__a" href="', $html);
        $rsp = "";
        $nameThisName = "";
        for ($i=1; $i < count($html); $i++) {
          if($i > 1){
            $rsp .= ", ";
          }
          $cur = urldecode(explode('">',$html[$i])[0]);
          $cur = explode('https://store.steampowered.com/app/',$cur)[1];
          $bk = explode('/',$cur);
          $name = str_replace("_", " ", $bk[1]);
          $link = $bk[0];
          if($i == 1){
            $nameThisName = $name;
          } else {
            if(strpos($name, "?l=") === false){
              $rsp .= $name;
            }
          }
        }

        // remove duplicates
        $allGames = explode(", ", $rsp);
        $allGames = array_slice($allGames, 0, 13+2);
        $allGames = array_unique($allGames);
        $rsp = "";
        for($i=0; $i<count($allGames); $i++){
          if($i > 1){
            $rsp .= substr($allGames[$i],0,73).", ";
          } else {
            $rsp .= substr($allGames[$i],0,73);
          }
        }

        if($nameThisName == ""){
          $resp = '{
            "response": {
              "text": "Не знаю. Попробуйте написать больше слов или то же, но на английском",
              "buttons": [
                  {
                      "title": "Помощь",
                      "hide": true
                  }
              ],
              "end_session": false
            },
            "version": "1.0"
          }';
        } else {
          $resp = '{
            "response": {
              "text": "'.$nameThisName.'?",
              "buttons": [
                  {
                      "title": "Да",
                      "hide": true
                  },
                  {
                      "title": "Нет",
                      "hide": true
                  },
                  {
                      "title": "Помощь",
                      "hide": true
                  }
              ],
              "end_session": false
            },
            "version": "1.0"
          }';
          $servername = "localhost";
          $username = "sqlaccess";
          $password = "SuQddsVwkFjVPwNDQSUKPPKBU9M3";
          $dbname = "alice";
          $conn = new mysqli($servername, $username, $password, $dbname);
          $sql = "SELECT state FROM sessions WHERE sessionID='".$j['session']['user_id']."'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $sql = "UPDATE sessions SET state='zagadano',info='".$rsp."' WHERE sessionID='".$j['session']['user_id']."'";
          } else {
            $sql = "INSERT INTO `sessions`(`sessionID`,`state`,`info`) VALUES ('".$j['session']['user_id']."','zagadano','".$rsp."')";
          }
          $result = $conn->query($sql);
          $conn->close();
        }
      } else {
        $resp = '{
          "response": {
            "text": "Я вас не совсем поняла. Скажите Помощь, чтобы я вернулась в начало",
            "buttons": [
                {
                    "title": "Помощь",
                    "hide": true
                }
            ],
            "end_session": false
          },
          "version": "1.0"
        }';
      }
    }
*/
    break;
}

print_r($resp);

function kek($k) {
  if($k == 1){
    return $k." слово и оно начинается с буквы ";
  }
  if($k >= 2 && $k <= 4){
    return $k." слова и они начинаются с букв ";
  }
  if($k > 4){
    return $k." слов и они начинаются с букв ";
  }
}

function getToDate()
{
  $m = "";
  switch(date('m')){
    case "01": $m = "января"; break;
    case "02": $m = "февраля"; break;
    case "03": $m = "марта"; break;
    case "04": $m = "апреля"; break;
    case "05": $m = "мая"; break;
    case "06": $m = "июня"; break;
    case "07": $m = "июля"; break;
    case "08": $m = "августа"; break;
    case "09": $m = "сентября"; break;
    case "10": $m = "октября"; break;
    case "11": $m = "ноября"; break;
    case "12": $m = "декабря"; break;
  }
  return date('d').' '.$m.' '.date('Y');
}

function nameletters($name)
{
  file_put_contents("0",$name);
  $names = explode(" ", $name);
  $name = "";
  file_put_contents("1",count($names));
  $re = "/((.{1})(.*)(.{1}))/mi";
  for($i = 0; $i < count($names); $i++){
    if($i > 0){
      $name .= " ";
    }
    $tmp = preg_replace("/\B.\B/mi"," _",$names[$i]);
    $name .= preg_replace($re, "$2".substr($tmp,1,strlen($tmp)-2)."$4", $names[$i]); //".substr(0,count($tmp)-1,$tmp)."
  }
  return $name;
}
?>
