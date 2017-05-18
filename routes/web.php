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