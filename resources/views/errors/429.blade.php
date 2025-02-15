@extends('errors::layout')

@section('title', __('Muitos Pedidos'))
@section('code', '429')
@section('header', 'Calma!')
@section('message', __('Você enviou muitas requisições (Too Many Requests)'))
