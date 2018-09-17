<?php
// FUNCTION THAT DISPLAY THE GAME GAMELEADERBOARD
function getLeaderboard() { // Use 'echo var_dump(getLeaderboard())' to display the result
  $config = json_decode(file_get_contents('config.json'));
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetLeaderboard",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"MaxResultsCount\":100,\"ProfileConstraints\":{\"ShowAvatarUrl\":true,\"ShowBannedUntil\":false,\"ShowCampaignAttributions\":false,\"ShowContactEmailAddresses\":false,\"ShowCreated\":false,\"ShowDisplayName\":true,\"ShowLastLogin\":false,\"ShowLinkedAccounts\":false,\"ShowLocations\":false,\"ShowMemberships\":false,\"ShowOrigination\":false,\"ShowPushNotificationRegistrations\":false,\"ShowStatistics\":false,\"ShowTags\":false,\"ShowTotalValueToDateInUsd\":false,\"ShowValuesToDate\":false},\"StartPosition\":0,\"StatisticName\":\"fishki\",\"Version\":null}",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json",
      "x-authorization: $config->xAuthToken"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return $err;
  } else {
    if (json_decode($response)->code !== 200) {
      return 'Error: '.json_decode($response)->code;
    } else {
      return json_decode($response);
    }
  }
}

// FUNCTION THAT GET THE USER INVENTORY BY THE TOKEN
function getUserInventory() {
  $config = json_decode(file_get_contents('config.json'));
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetUserInventory",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json",
      "x-authorization: $config->xAuthToken"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return $err;
  } else {
    return json_decode($response);
  }
}

// FUNCTION THAT GET THE USER DATA OF THE X-authorization
function getUserData($playFabId) {
  if (isset($playFabId)) {
    $config = json_decode(file_get_contents('config.json'));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetUserData",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"IfChangedFromDataVersion\":null,\"Keys\":null,\"PlayFabId\":\"$playFabId\"}",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "x-authorization: 15456D213451D68B-76561198068148333-EC9912BA1D165A42-7EAA-8D61CBA79E924EE-BLnnveQQFbNgwhP61JrJd4f0BFCT28qzxY6sgketrZM="
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return $err;
    } else {
      return json_decode($response);
    }
  } else {
    return 'Error, you have to put a PlayFabID in getUserData() function';
  }
}

function getTitleNews() {
  $config = json_decode(file_get_contents('config.json'));
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetTitleNews",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json",
      "x-authorization: $config->xAuthToken"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return 'Error : '.$err;
  } else {
    return json_decode($response);
  }
}

function getFriendsList() {
  $config = json_decode(file_get_contents('config.json'));
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetFriendsList",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json",
      "x-authorization: $config->xAuthToken"
    ),
    CURLOPT_POSTFIELDS => "{\"IncludeFacebookFriends\":null,\"IncludeSteamFriends\":true,\"ProfileConstraints\":{\"ShowAvatarUrl\":true,\"ShowBannedUntil\":false,\"ShowCampaignAttributions\":false,\"ShowContactEmailAddresses\":false,\"ShowCreated\":false,\"ShowDisplayName\":true,\"ShowLastLogin\":false,\"ShowLinkedAccounts\":true,\"ShowLocations\":false,\"ShowMemberships\":false,\"ShowOrigination\":false,\"ShowPushNotificationRegistrations\":false,\"ShowStatistics\":false,\"ShowTags\":false,\"ShowTotalValueToDateInUsd\":false,\"ShowValuesToDate\":false}}",
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return 'Error : '.$err;
  } else {
    return json_decode($response);
  }
}

function getPlayerProfile($playFabId) { //The paramater must be a playFabId
  if (isset($playFabId)) {
    $config = json_decode(file_get_contents('config.json'));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://7eaa.playfabapi.com/Client/GetPlayerProfile",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"PlayFabId\":\"$playFabId\",\"ProfileConstraints\":{\"ShowAvatarUrl\":true,\"ShowBannedUntil\":false,\"ShowCampaignAttributions\":false,\"ShowContactEmailAddresses\":false,\"ShowCreated\":false,\"ShowDisplayName\":true,\"ShowLastLogin\":false,\"ShowLinkedAccounts\":false,\"ShowLocations\":true,\"ShowMemberships\":false,\"ShowOrigination\":false,\"ShowPushNotificationRegistrations\":false,\"ShowStatistics\":false,\"ShowTags\":false,\"ShowTotalValueToDateInUsd\":false,\"ShowValuesToDate\":false}}",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "x-authorization: $config->xAuthToken"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  } else {
    return 'Error, you have to put a PlayFabID in getPlayerProfile() function';
  }
}
?>
