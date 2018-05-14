<?php
/**
 * Created by PhpStorm.
 * User: hussein
 * Date: 4/8/18
 * Time: 12:38 PM
 */?>


@extends('layouts.app')

@section('content')

    <div class="container" >
        @emojione(':smile: ❤️')
        <hr>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="col-md-6 panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages" :current_id="current_id" :count="count" :emoji="emoji" :users = "users"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
                <div class="col-md-6">
                    <user-list :users = "users" :current_id="current_id"></user-list>
                </div>
            </div>
        </div>
    </div>

@endsection
