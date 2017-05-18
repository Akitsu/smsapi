<?php

$app->get('getallmessages', [
    'as' => 'allmessages', 'uses' => 'MessageController@getAllMessages'
]);
$app->get('getmesssagebynumber', [
    'as' => 'getmesssagebynumber', 'uses' => 'MessageController@getMessagesByNumber'
]);
$app->get('getmessagebyterm', [
    'as' => 'getmessagebyterm', 'uses' => 'MessageController@getMessagesByTerm'
]);
$app->get('getmessagebyid', [
    'as' => 'getmessagebyid', 'uses' => 'MessageController@getMessagesById'
]);

$app->post('sendtext', [
    'as' => 'sendtext', 'uses' => 'MessageController@sendText'
]);
$app->post('markasread', [
    'as' => 'markasread', 'uses' => 'MessageController@markAsRead'
]);
$app->post('markasunread', [
    'as' => 'markasunread', 'uses' => 'MessageController@markAsUnread'
]);
$app->post('deletetext', [
    'as' => 'deletetext', 'uses' => 'MessageController@deleteText'
]);