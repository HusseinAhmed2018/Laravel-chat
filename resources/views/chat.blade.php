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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages" :current_id="current_id" :count="count"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
