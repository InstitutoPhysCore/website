@extends('errors::layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('header', 'Uh-oh!')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
