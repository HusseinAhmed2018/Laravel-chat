<?php
/**
 * Created by PhpStorm.
 * User: Hussein Ahmed
 * Date: 5/14/2018
 * Time: 10:48 AM
 */?>

@extends('layouts.app')

@section('content')

    <div class="container" >
        @emojione(':smile: ❤️')
        <hr>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="col-md-12">
                    <user-list :users = "users" :current_id="current_id"></user-list>
                </div>
            </div>
        </div>
    </div>

@endsection