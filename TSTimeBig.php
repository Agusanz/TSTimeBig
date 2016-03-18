<?php

require_once("TeamSpeak3/TeamSpeak3.php");

TeamSpeak3::init();

$user = "serveradmin";
$pass = "mc4zYL9G";
$serverIP = "127.0.0.1";
$botTime1Channel = 2;
$botTime2Channel = 3;
$botTime3Channel = 4;
$botTime4Channel = 5;
$botUsersChannel = 6;
$nickname = "TimeBot";

try
{
	$ts3 = TeamSpeak3::factory("serverquery://{$user}:{$pass}@{$serverIP}:10011/?server_port=9987&blocking=0&nickname={$nickname}");

    $BotChannelTime1 = $ts3->channelGetById($botTime1Channel);
    $BotChannelTime2 = $ts3->channelGetById($botTime2Channel);
    $BotChannelTime3 = $ts3->channelGetById($botTime3Channel);
    $BotChannelTime4 = $ts3->channelGetById($botTime4Channel);
    $BotChannelUsuarios = $ts3->channelGetById($botUsersChannel);

    $unixTime = time();
	$realTime = date('[Y-m-d] [H:i:s]',$unixTime);
    echo $realTime."\t[INFO] Connected\n";

    $line1[0] = "▄▀▀▀▄";
    $line2[0] = "█───█";
    $line3[0] = "█───█";
    $line4[0] = "▀▄▄▄▀";

    $line1[1] = "─▄█";
    $line2[1] = "▀─█";
    $line3[1] = "──█";
    $line4[1] = "──█";

    $line1[2] = "▄▀▀▀▄";
    $line2[2] = "───▄▀";
    $line3[2] = "─▄▀──";
    $line4[2] = "█▄▄▄▄";

    $line1[3] = "▄▀▀▀▄";
    $line2[3] = "──▄▄█";
    $line3[3] = "────█";
    $line4[3] = "▀▄▄▄▀";

    $line1[4] = "───▄█─";
    $line2[4] = "─▄▀─█─";
    $line3[4] = "█▄▄▄█▄";
    $line4[4] = "────█─";

    $line1[5] = "█▀▀▀▀";
    $line2[5] = "█▄▄▄─";
    $line3[5] = "────█";
    $line4[5] = "▀▄▄▄▀";

    $line1[6] = "▄▀▀▀▄";
    $line2[6] = "█▄▄▄─";
    $line3[6] = "█───█";
    $line4[6] = "▀▄▄▄▀";

    $line1[7] = "▀▀▀▀█";
    $line2[7] = "────█";
    $line3[7] = "──▄▀─";
    $line4[7] = "─█───";

    $line1[8] = "▄▀▀▀▄";
    $line2[8] = "▀▄▄▄▀";
    $line3[8] = "█───█";
    $line4[8] = "▀▄▄▄▀";

    $line1[9] = "▄▀▀▀▄";
    $line2[9] = "▀▄▄▄▀";
    $line3[9] = "────█";
    $line4[9] = "▀▄▄▄▀";

    $time = date('H:i', time());            
    $time_explode = explode(':', date('H:i') );
    $time_H = str_split($time_explode[0],1);
    $time_H1 = $time_H[0];
    $time_H2 = $time_H[1];
    $time_M = str_split($time_explode[1],1);
    $time_M1 = $time_M[0];
    $time_M2 = $time_M[1];      

    $channel_time1 =  "[cspacer]".$line1[$time_H1]."─".$line1[$time_H2]."─────".$line1[$time_M1]."─".$line1[$time_M2];
    $channel_time2 =  "[cspacer]".$line2[$time_H1]."─".$line2[$time_H2]."──▀──".$line2[$time_M1]."─".$line2[$time_M2];
    $channel_time3 =  "[cspacer]".$line3[$time_H1]."─".$line3[$time_H2]."──▄──".$line3[$time_M1]."─".$line3[$time_M2];
    $channel_time4 =  "[cspacer]".$line4[$time_H1]."─".$line4[$time_H2]."─────".$line4[$time_M1]."─".$line4[$time_M2];

    if($BotChannelTime1["channel_name"] != $channel_time1)
    {
        $BotChannelTime1["channel_name"] = $channel_time1;
        $unixTime = time();
        $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
        echo $realTime."\t[INFO] BotChannelTime1 updated\n";
    }

    if($BotChannelTime2["channel_name"] != $channel_time2)
    {
        $BotChannelTime2["channel_name"] = $channel_time2;
        $unixTime = time();
        $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
        echo $realTime."\t[INFO] BotChannelTime2 updated\n";
    }

    if($BotChannelTime3["channel_name"] != $channel_time3)
    {
        $BotChannelTime3["channel_name"] = $channel_time3;
        $unixTime = time();
        $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
        echo $realTime."\t[INFO] BotChannelTime3 updated\n";
    }

    if($BotChannelTime4["channel_name"] != $channel_time4)
    {
        $BotChannelTime4["channel_name"] = $channel_time4;$unixTime = time();
        $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
        echo $realTime."\t[INFO] BotChannelTime4 updated\n";
    }
    sleep(2);

    $serverInfo = $ts3->getInfo();
    $maxSlots = $serverInfo["virtualserver_maxclients"];
    $clientsOnline = $serverInfo["virtualserver_clientsonline"];
    $slotsReserved = $serverInfo["virtualserver_reserved_slots"];
    $slotsAvailable = $maxSlots - $slotsReserved;

    if($BotChannelUsuarios["channel_name"] != "[cspacer0] Users online: {$clientsOnline}/{$slotsAvailable}")
    {
        $BotChannelUsuarios["channel_name"] = "[cspacer0] Users online: {$clientsOnline}/{$slotsAvailable}";
        $unixTime = time();
        $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
        echo $realTime."\t[INFO] Users online updated\n";
    }

    $unixTime = time();
    $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
    die($realTime."\t[INFO] Finished.\n");
}
catch(Exception $e)
{
    $unixTime = time();
    $realTime = date('[Y-m-d] [H:i:s]',$unixTime);
    echo "Failed\n";
    die($realTime."\t[ERROR]  " . $e->getMessage() . "\n". $e->getTraceAsString() ."\n");
}