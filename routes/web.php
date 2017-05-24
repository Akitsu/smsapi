<?php

//MessageController
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

//PhoneController
$app->get('getstatus', [
    'as' => 'getstatus', 'uses' => 'PhoneController@getStatus'
]);

//SentMessageController
$app->get('getsentmessages', [
    'as' => 'getsentmessages', 'uses' => 'SentMessageController@getSentMessages'
]);
$app->post('getsentmessagesbynumber', [
    'as' => 'getsentmessagesbynumber', 'uses' => 'SentMessageController@getSentMessagesByNumber'
]);
$app->post('getsentmessagesbyterm', [
    'as' => 'getsentmessagesbyterm', 'uses' => 'SentMessageController@getSentMessagesByTerm'
]);
$app->post('getsentmessagesbyid', [
    'as' => 'getsentmessagesbyid', 'uses' => 'SentMessageController@getSentMessagesById'
]);
$app->post('deletesentmessage', [
    'as' => 'deletesentmessage', 'uses' => 'SentMessageController@deleteSentMessage'
]);

//OutboxController
$app->get('getoutboxmessages', [
    'as' => 'getoutboxmessages', 'uses' => 'OutboxMessageController@getAllOutboxMessages'
]);
$app->post('getoutboxmessagesbynumber', [
    'as' => 'getoutboxmessagesbynumber', 'uses' => 'OutboxMessageController@getOutboxMessagesByNumber'
]);
$app->post('getoutboxmessagesbyterm', [
    'as' => 'getoutboxmessagesbyterm', 'uses' => 'OutboxMessageController@getOutboxMessagesByTerm'
]);
$app->post('getoutboxmessagesbyid', [
    'as' => 'getoutboxmessagesbyid', 'uses' => 'OutboxMessageController@getOutboxMessagesById'
]);
$app->post('deleteoutboxmessage', [
    'as' => 'deleteoutboxmessage', 'uses' => 'OutboxMessageController@deleteOutboxMessage'
]);
$app->post('updateoutboxmessagedate', [
    'as' => 'updateoutboxmessagedate', 'uses' => 'OutboxMessageController@updateOutboxMessageDate'
]);
$app->post('updateoutboxmessagetext', [
    'as' => 'updateoutboxmessagetext', 'uses' => 'OutboxMessageController@updateOutboxMessageText'
]);

$app->group(['middleware' => 'auth'], function () use ($app) {
    $app->post('test', [
        'as' => 'test', 'uses' => 'MessageController@test'
    ]);
});

$app->post('createaccount', [
    'as' => 'createaccount', 'uses' => 'UserController@createAccount'
]);

$app->post('login', [
    'as' => 'login', 'uses' => 'UserController@login'
]);

$app->post('test', [
    'as' => 'test', 'uses' => 'UserController@test'
]);