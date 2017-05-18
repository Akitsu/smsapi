<?php

$app->get('getallmessages', [
    'as' => 'allmessages', 'uses' => 'MessageController@getAllMessages'
]);
$app->post('getmesssagebynumber', [
    'as' => 'getmesssagebynumber', 'uses' => 'MessageController@getMessagesByNumber'
]);
$app->post('getmessagebyterm', [
    'as' => 'getmessagebyterm', 'uses' => 'MessageController@getMessagesByTerm'
]);
$app->post('getmessagebyid', [
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