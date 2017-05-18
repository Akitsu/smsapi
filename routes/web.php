<?php

$app->get('getallmessages', [
    'as' => 'allmessages', 'uses' => 'MessageController@getAllMessages'
]);
$app->post('getmessagesbynumber', [
    'as' => 'getmessagesbynumber', 'uses' => 'MessageController@getMessagesByNumber'
]);
$app->post('getmessagesbyterm', [
    'as' => 'getmessagesbyterm', 'uses' => 'MessageController@getMessagesByTerm'
]);
$app->post('getmessagesbyid', [
    'as' => 'getmessagesbyid', 'uses' => 'MessageController@getMessagesById'
]);

$app->post('sendmessage', [
    'as' => 'sendmessage', 'uses' => 'MessageController@sendMessage'
]);
$app->post('markasread', [
    'as' => 'markasread', 'uses' => 'MessageController@markAsRead'
]);
$app->post('markasunread', [
    'as' => 'markasunread', 'uses' => 'MessageController@markAsUnread'
]);
$app->post('deletemessage', [
    'as' => 'deletemessage', 'uses' => 'MessageController@deleteMessage'
]);
$app->get('getstatus', [
    'as' => 'getstatus', 'uses' => 'PhoneController@getStatus'
]);
$app->get('getsentmessages', [
    'as' => 'getsentmessages', 'uses' => 'SentMessageController@getSentMessages'
]);